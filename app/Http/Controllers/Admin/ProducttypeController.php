<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProducttypeStoreRequest;
use App\Http\Requests\ProducttypeUpdateRequest;
use Alert;

use App\Producttype;


class ProducttypeController extends Controller
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
    public function index()
    {
       $producttypes = Producttype::orderBy('id', 'DESC')->paginate();

       return view('admin.complements.producttypes.index', compact('producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.complements.producttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducttypeStoreRequest $request)
    {
        $producttype = Producttype::create($request->all());


        Alert::success('Tipo de Producto creado con exito')->persistent('Cerrar');
        return redirect()->route('producttypes.index');

        //return redirect()->route('reasons.edit', $reason->id)->with('info', 'Razon creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producttype = Producttype::find($id);

        return view('admin.complements.producttypes.show', compact('producttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = Producttype::find($id);

        return view('admin.complements.producttypes.edit', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProducttypeUpdateRequest $request, $id)
    {
        $producttype = Producttype::find($id);

        $producttype->fill($request->all())->save();

        //return redirect()->route('admin.complements.equipments.edit', $equipment->id)->with('info', 'Equipo actualizado con exito');
        Alert::success('Tipo de Producto actualizado con exito')->persistent('Cerrar');
        return redirect()->route('producttypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        /*if(Reception::where('reason_id', $id)->first()) 
        {
            Alert::error('No se puede eliminar el registro')->persistent('Cerrar');
            return back();
        }*/

        Producttype::find($id)->delete();

        Alert::success('Eliminado correctamente')->persistent('Cerrar');
        return back();
    }
}
