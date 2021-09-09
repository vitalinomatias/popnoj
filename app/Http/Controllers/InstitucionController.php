<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Tipo;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institucion::where('estado', 1)->get();
        return view('instituciones.index', compact('instituciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::where('estado', 1)->get();
        return view('instituciones.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institucione = Institucion::create([
            'nombre_institucion' => request('nombre_institucion'),
            'director' => request('director'),
            'contacto' => request('contacto'),
            'cargo' => request('cargo'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'direciion_local' => request('direciion_local'),
            'direciion_central' => request('direciion_central'),
            'estado' => 1,
            'tipo' => request('tipo'),
        ]);
        
        return redirect()->route('instituciones.show',compact('institucione'))->with('status', 'Nueva institucion creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucione)
    {
        $tipo = Tipo::find($institucione->tipo);
        
        return view('instituciones.show', compact('institucione','tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        //
    }
}
