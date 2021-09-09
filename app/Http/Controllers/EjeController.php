<?php

namespace App\Http\Controllers;

use App\Models\Eje;
use Illuminate\Http\Request;

class EjeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejes = Eje::where('estado',1)->get();
        // dd($ejes);
        return view('ejes.index',compact('ejes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ejes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eje = Eje::create([
            'eje' =>request('eje'),
            'descripcion' => request('descripcion'),
            'estado' => 1
        ]);
        
        return redirect()->route('ejes.index')->with('status', 'Eje de trabajo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eje  $eje
     * @return \Illuminate\Http\Response
     */
    public function show(Eje $eje)
    {
        return view('ejes.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eje  $eje
     * @return \Illuminate\Http\Response
     */
    public function edit(Eje $eje)
    {
        return view('ejes.edit',compact('eje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eje  $eje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eje $eje)
    {
        $eje->update([
            'eje' => request('eje'),
            'descripcion' => request('descripcion')

        ]);
        
        return redirect()->route('ejes.index')->with('status', 'Eje de trabajo actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eje  $eje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eje $eje)
    {
        $eje->update([
            'estado' => 0
        ]);

        return back()->with('status', 'Eje de trabajo eliminada con éxito');
    }
}
