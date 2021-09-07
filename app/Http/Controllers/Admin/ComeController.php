<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ComeStoreRequest;
use App\Http\Requests\ComeUpdateRequest;
use Alert;

use App\Come;
use App\Reception;

class ComeController extends Controller
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
       $comes = Come::orderBy('id', 'DESC')->paginate();

       return view('admin.complements.comes.index', compact('comes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.complements.comes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComeStoreRequest $request)
    {
        $come = Come::create($request->all());


        Alert::success('Registro creado con exito')->persistent('Cerrar');
        return redirect()->route('comes.index');

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
        $come = Come::find($id);

        return view('admin.complements.comes.show', compact('come'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $come = Come::find($id);

        return view('admin.complements.comes.edit', compact('come'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComeUpdateRequest $request, $id)
    {
        $come = Come::find($id);

        $come->fill($request->all())->save();

        //return redirect()->route('admin.complements.equipments.edit', $equipment->id)->with('info', 'Equipo actualizado con exito');
        Alert::success('Registro actualizado con exito')->persistent('Cerrar');
        return redirect()->route('comes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Reception::where('come_id', $id)->first()) 
        {
            Alert::error('No se puede eliminar el registro')->persistent('Cerrar');
            return back();
        }

        Come::find($id)->delete();

        Alert::success('Eliminado correctamente')->persistent('Cerrar');
        return back();
    }
}
