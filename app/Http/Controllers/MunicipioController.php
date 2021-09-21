<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use PDF;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::where('estado', 1)->get();
        $eliminados = Municipio::where('estado', 0)->get();
        return view('municipios.index', compact('municipios','eliminados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::where('estado', 1)->get();
        return view('municipios.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = Municipio::create([
            'municipio' => request('municipio'),
            'estado' => 1,
            'departamento' => request('departamento'),
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('municipios.index')->with('status', 'Municipio creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        return view('municipios.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $departamentos = Departamento::where('estado', 1)->get();
        return view('municipios.edit', compact('municipio','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $municipio->update([
            'municipio' => request('municipio'),
            'departamento' => request('departamento'),
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('municipios.index')->with('status', 'Municipio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->update([
            'estado' => 0,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Municipio eliminado con éxito');
    }

    public function imprimir()
    {
        $municipios = Municipio::where('estado', 1)->get();

        $pdf = PDF::loadview('municipios.pdf', compact('municipios'));
     
        return $pdf->stream('Municipios.pdf');
    }

    public function activar(Municipio $municipio)
    {
        $municipio->update([
            'estado' => 1,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Municipio eliminado con éxito');
    }
}
