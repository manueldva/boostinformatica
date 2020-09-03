<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Delivery;
use App\Empresa;
use App\Reception;
use App\Client;
use App\reason;
use App\Helpers\FechaHelper;
use Barryvdh\DomPDF\Facade as PDF;
use Alert;
use DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id == 1) { // ventas por repartidor
            return view('admin.reports.show1');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function informeequiporeparadoprint($fechadesde, $fechahasta)
    {
        
        $deliveries1 = 
        "select 
            C.id client_id,
            C.name,
            D.deliverdate 
            from receptions R
            inner join deliveries D on R.id = D.reception_id
            inner join clients C on R.client_id =  C.id
            where 

            R.status = 'REPAIRING' and D.deliverDate between '" . $fechadesde . "' and '" . $fechahasta . "'
            order by D.deliverDate";
       
        $deliveries = DB::select($deliveries1);
        
        
        //dd($deliveries1);

        $pdf = PDF::loadView('admin.reports.informeequiporeparadoprint', compact('deliveries'));
            //$pdf->setPaper('Legal', 'landscape');

        //return $pdf->setPaper('Legal', 'landscape')->stream('informeequiporeparadoprint.pdf');
      
       return $pdf->setPaper('a4')->stream('informeequiporeparadoprint.pdf');
        //echo 1;
    }
}
