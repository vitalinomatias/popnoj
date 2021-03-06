<?php

namespace App\Http\Controllers;

use App\Models\Poblacion;
use Illuminate\Http\Request;
use PDF;

class PoblacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poblaciones = Poblacion::where('estado', 1)->get();
        $eliminados = Poblacion::where('estado', 0)->get();
        return view('poblaciones.index', compact('poblaciones', 'eliminados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poblaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poblacion = Poblacion::create([
            'poblacion' =>request('poblacion'),
            'descripcion' => request('descripcion'),
            'estado' => 1,
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('poblaciones.index')->with('status', 'Población creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poblacion  $poblacion
     * @return \Illuminate\Http\Response
     */
    public function show(Poblacion $poblacion)
    {
        return view('poblaciones.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poblacion  $poblacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Poblacion $poblacione)
    {
        // dd($poblacione->descripcion);
        return view('poblaciones.edit',compact('poblacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poblacion  $poblacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poblacion $poblacione)
    {
        $poblacione->update([
            'poblacion' => request('poblacion'),
            'descripcion' => request('descripcion'),
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('poblaciones.index')->with('status', 'Población actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poblacion  $poblacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poblacion $poblacione)
    {
        $poblacione->update([
            'estado' => 0,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Población eliminada con éxito');
    }

    public function imprimir()
    {
        $poblaciones = Poblacion::where('estado', 1)->get();

        $pdf = PDF::loadview('poblaciones.pdf', compact('poblaciones'));
     
        return $pdf->stream('Poblaciones.pdf');
    }

    public function activar(Poblacion $poblacione)
    {
        $poblacione->update([
            'estado' => 1,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Población activada con éxito');
    }
}
