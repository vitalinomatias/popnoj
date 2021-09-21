<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use PDF;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::where('estado', 1)->get();
        $eliminados = Tipo::where('estado', 0)->get();
        return view('tipos.index', compact('tipos','eliminados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = Tipo::create([
            'tipo' =>request('tipo'),
            'estado' =>1,
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('tipos.index')->with('status', 'Tipo de institución creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        return view('tipos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->update([
            'tipo' => request('tipo'),
            'user_id' => auth()->user()->id

        ]);
        
        return redirect()->route('tipos.index')->with('status', 'Tipo de institución actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->update([
            'estado' => 0,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Tipo de institución eliminado con éxito');
    }

    public function imprimir()
    {
        $tipos = Tipo::where('estado', 1)->get();

        $pdf = PDF::loadview('tipos.pdf', compact('tipos'));
     
        return $pdf->stream('Tipos_Institución.pdf');
    }

    public function activar(Tipo $tipo)
    {
        $tipo->update([
            'estado' => 1,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Tipo de institución activada con éxito');
    }
}
