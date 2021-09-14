<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Eje;
use App\Models\Institucion;
use App\Models\Municipio;
use App\Models\Pais;
use App\Models\Poblacion;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

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
        $poblaciones = Poblacion::where('estado', 1)->get();
        $ejes = Eje::where('estado', 1)->get();
        $paises = Pais::where('estado', 1)->get();
        $departamentos = Departamento::where('estado', 1)->get();
        $municipios = Municipio::where('estado', 1)->get();
        
        // dd($institucione->ejes);

        return view('instituciones.show', compact('institucione','tipo', 'poblaciones', 'ejes', 'paises', 'departamentos', 'municipios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucione)
    {
        $tipos = Tipo::where('estado', 1)->get();
        return view('instituciones.edit', compact('institucione', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucione)
    {
        $institucione->update([
            'nombre_institucion' => request('nombre_institucion'),
            'director' => request('director'),
            'contacto' => request('contacto'),
            'cargo' => request('cargo'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'direciion_local' => request('direciion_local'),
            'direciion_central' => request('direciion_central'),
            'tipo' => request('tipo'),
        ]);
        
        // return redirect()->route('instituciones.index')->with('status', 'Institución actualizada con éxito');
        return redirect()->route('instituciones.show',compact('institucione'))->with('status', 'Institucion actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucione)
    {
        $institucione->update([
            'estado' => 0
        ]);

        return back()->with('status', 'Insititución eliminada con éxito');
    }

    public function storepoblacion(Request $request, Institucion $institucione)
    {
        $poblacion = Institucion::find($institucione->id);
        $poblacion->poblaciones()->attach(request('id_poblacion'));

        return redirect()->route('instituciones.show',compact('institucione'))->with('status', 'Nueva población agregada con éxito');
    }

    public function storeeje(Request $request, Institucion $institucione)
    {
        $eje = Institucion::find($institucione->id);
        $eje->ejes()->attach(request('id_eje'));

        return redirect()->route('instituciones.show',compact('institucione'))->with('status', 'Nuevo eje agregado con éxito');
    }

    public function storecobertura(Request $request, Institucion $institucione)
    {
        $cobertura = Institucion::find($institucione->id);

        $cobertura->paises()->attach(request('id_pais'), [
            'id_departamento' => request('id_departamento'),
            'id_municipio' => request('id_municipio')
        ]);

        $consulta = DB::table('cobertura_institucion')->where([
            'id_pais' => 1,
            // 'id_departamento' =>1
            ])->get();

        // $instituciones = Institucion::where('estado', 1)->get();
        // dd($consulta);

        return redirect()->route('instituciones.show',compact('institucione'))->with('status', 'Nueva población agregada con éxito');
    }

    public function destroypoblacion($institucione, $id_poblacion)
    {
        $poblacion = Institucion::find($institucione);

        $poblacion->poblaciones()->detach($id_poblacion);

        return back()->with('status', 'Población eliminada con éxito');
    }

    public function destroyeje($institucione, $id_eje)
    {
        $eje = Institucion::find($institucione);

        $eje->ejes()->detach($id_eje);

        return back()->with('status', 'Eje de trabajo eliminado con éxito');
    }

    public function imprimir()
    {
        $instituciones = Institucion::where('estado', 1)->get();

        $pdf = PDF::loadview('instituciones.pdf', compact('instituciones'));
     
        return $pdf->stream('Instituciones.pdf');
        
    }

    public function imprimirIndividual(Institucion $institucione)
    {
        $tipo = Tipo::find($institucione->tipo);
        $poblaciones = Poblacion::where('estado', 1)->get();
        $ejes = Eje::where('estado', 1)->get();
        $paises = Pais::where('estado', 1)->get();
        $departamentos = Departamento::where('estado', 1)->get();
        $municipios = Municipio::where('estado', 1)->get();
        

        // return view('instituciones.show', compact('institucione','tipo', 'poblaciones', 'ejes', 'paises', 'departamentos', 'municipios'));

        $pdf = PDF::loadview('instituciones.pdfIndivudual', compact('institucione','tipo', 'poblaciones', 'ejes', 'paises', 'departamentos', 'municipios'));
     
        return $pdf->stream($institucione->nombre_institucion . '.pdf');
        
    }
}
