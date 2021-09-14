<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Models\Pais;
use Illuminate\Http\Request;
use PDF;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::where('estado',1)->get();
        // dd($paises);
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create');
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
        $pais = Pais::create([
            'name' =>request('name'),
            'estado' =>1
        ]);
        
        return redirect()->route('paises.index')->with('status', 'Pais creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        return view('paises.show', compact($pais));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit(Pais $paise)
    {
        return view('paises.edit', compact('paise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, Pais $paise)
    {
        //  $paise->update($request->all());
        $paise->update([
            'name' => request('name'),
            'estado' =>1
        ]);
        
        return redirect()->route('paises.index')->with('status', 'Pais actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pais $paise)
    {
        $paise->update([
            'estado' => 0
        ]);

        return back()->with('status', 'Pais eliminado con éxito');
    }

    public function imprimir()
    {
        $paises = Pais::where('estado',1)->get();

        $pdf = PDF::loadview('paises.pdf', compact('paises'));
     
        return $pdf->stream('paises.pdf');
    }
}
