<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ReceptionStoreRequest;
use App\Http\Requests\ReceptionUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Alert;

use App\Helpers\FechaHelper;
use Barryvdh\DomPDF\Facade as PDF;

use App\Delivery;
use App\Empresa;
use App\Reception;
use App\Client;
use App\Reason;
use App\Come;
use App\Equipment;


class ReceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //$receptions = Reception::orderBy('id', 'DESC')->paginate();

        $receptions = Reception::type($request->get('type'), $request->get('val'),$request->get('status'))->paginate(10);
        $receptions->setPath('receptions');

        //$status[] = ['WAITING' => 'En Espera', 'RECEIVED' => 'Recibido', 'REPAIRING' => 'Reparado'];
        //return $receptions;

        /*para marcar como no reparado*/
        foreach ($receptions as $key => $value) {
            $delivery = Delivery::where('reception_id', $value->id)->first();
            if ($delivery) {
                if ($delivery->repaired == 'NOT') {
                    $value->status = 'REPAIRED';
                }
            }
        }


       return view('admin.receptions.index', compact('receptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $clients   = Client::orderBy('name', 'ASC')->pluck('name', 'id');

        //dd($clients);
        //$clients    = Client::orderBy('name', 'ASC')->pluck('name', 'id');
        $reasons    = Reason::orderBy('description', 'ASC')->pluck('description' , 'id');
        $equipments = Equipment::orderBy('description', 'ASC')->pluck('description' , 'id');
        $comes    = Come::orderBy('description', 'ASC')->pluck('description' , 'id');

        return view('admin.receptions.create', compact('clients', 'reasons', 'equipments','comes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceptionStoreRequest $request)
    {
        
        //modificacion para cargar el id de la tabla manualmente

        if($request->get('codmanual') == "1") //modificacion para cargar el id de la tabla manualmente
        {
            
            if(Reception::where('id', $request->get('codigo'))->first()) // se verificar que no exista el id en la tabla
            {
                Alert::error('Ya existe el codigo que intenta ingresar')->persistent('Cerrar');
                return back()->withInput();
            } else { 
                $reception = new Reception();     
        
                        $reception->id                  =    $request->get('codigo');
                        $reception->client_id          =     $request->get('client_id');
                        $reception->equipment_id        =    $request->get('equipment_id');
                        $reception->description         =    $request->get('description');
                        $reception->reason_id           =    $request->get('reason_id');
                        $reception->concept             =    $request->get('concept');
                        $reception->status              =    $request->get('status');
                        $reception->budget              =    $request->get('budget');
                        if($request->get('drums')) {
                            $reception->drums           =    $request->get('drums');
                        } 
                        if($request->get('come_id')) {
                            $reception->come_id           =    $request->get('come_id');
                        }

                $reception->save();
            }
        }else {
            //dd($request->all());        
            $reception = Reception::create($request->all());
        }
       

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $reception->fill(['file' => asset($path)])->save();
        }


        if($request->get('come_id')) {
            $client = Client::find($request->get('client_id'));
            $client->fill(['come_id' => $request->get('come_id')])->save();
        }


        Alert::success('Recepción creada con exito')->persistent('Cerrar');
        return redirect()->route('receptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reception = Reception::find($id);

        return view('admin.receptions.show', compact('reception'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reception = Reception::find($id);

        $clients    = Client::orderBy('name', 'ASC')->pluck('name', 'id');
        $reasons    = Reason::orderBy('description', 'ASC')->pluck('description' , 'id');
        $equipments = Equipment::orderBy('description', 'ASC')->pluck('description' , 'id');
        $comes    = Come::orderBy('description', 'ASC')->pluck('description' , 'id');

        return view('admin.receptions.edit', compact('reception', 'clients', 'reasons', 'equipments','comes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceptionUpdateRequest $request, $id)
    {
        $reception = Reception::find($id);

        $reception->fill($request->all())->save();

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $reception->fill(['file' => asset($path)])->save();
        }

        if($request->get('come_id')) {
            $client = Client::find($request->get('client_id'));
            $client->fill(['come_id' => $request->get('come_id')])->save();
        }

        Alert::success('Recepción actualizada con exito')->persistent('Cerrar');
        return redirect()->route('receptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Delivery::where('reception_id', $id)->first()) 
        {
            Alert::error('No se puede eliminar el registro')->persistent('Cerrar');
            return back();
        }

        Reception::find($id)->delete();

        Alert::success('Eliminado correctamente')->persistent('Cerrar');
        return back();
    }


    public function printvoucherreception($id)
    {
        /*$delivery = Delivery::where('id', $id)->get();
        $delivery['0']['deliverDate'] = FechaHelper::getFechaImpresion($delivery['0']['deliverDate']);*/

        $empresa = Empresa::first();
        $empresa->inicioactividades = FechaHelper::getFechaImpresion($empresa->inicioactividades);

        $reception = Reception::find($id);
        $reception->description = FechaHelper::getFechaImpresion( now());
        
        //dd($reception);
        
        
        $pdf = PDF::loadView('admin.receptions.printvoucher', compact('reception', 'empresa'));

        return $pdf->stream('reporte.pdf');

        //return $pdf->download('informe.pdf');

        //return $id;
    }

}
