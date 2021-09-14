<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use PDF;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::where('estado',1)->get();
        
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::where('estado', 1)->get();
        return view('departamentos.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guardar los datos
        $departamento = Departamento::create([
            'departamento' => request('departamento'),
            'estado' => 1,
            'pais' => request('pais')
        ]);
        
        return redirect()->route('departamentos.index')->with('status', 'Departamento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    { 
        return view('departamentos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $paises = Pais::where('estado', 1)->get();
        return view('departamentos.edit', compact('departamento','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $departamento->update([
            'departamento' => request('departamento'),
            'estado' =>1,
            'pais' => request('pais')
        ]);
        
        return redirect()->route('departamentos.index')->with('status', 'Departamento actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->update([
            'estado' => 0
        ]);

        return back()->with('status', 'Departamento eliminado con éxito');
    }
    public function imprimir()
    {
        $departamentos = Departamento::where('estado',1)->get();

        $pdf = PDF::loadview('departamentos.pdf', compact('departamentos'));
     
        return $pdf->stream('Departamentos.pdf');
    }
}
