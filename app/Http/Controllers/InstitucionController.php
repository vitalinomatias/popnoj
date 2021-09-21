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
    /*public function index()
    {
        $instituciones = Institucion::where('estado', 1)->get();

        $paises = Pais::where('estado', 1)->get();
        $departamentos = Departamento::where('estado', 1)->get();
        $municipios = Municipio::where('estado', 1)->get();
        $poblaciones = Poblacion::where('estado', 1)->get();
        $ejes = Eje::where('estado', 1)->get();
        $tipos = Tipo::where('estado',1)->get();
        
        return view('instituciones.index', compact(
            'instituciones', 
            'paises',
            'departamentos',
            'municipios',
            'poblaciones',
            'ejes',
            'tipos'
        ));
    }*/


    public function index(Request $request)
    {

        function consulta($pais = null, $departamento = null, $municipio= null){
            $instituciones = Institucion::join('cobertura_institucion', 'cobertura_institucion.id_institucion', '=', 'institucions.id')
                                            ->where([
                                                'cobertura_institucion.id_pais' => $pais,
                                                'cobertura_institucion.id_departamento' => $departamento,
                                                'cobertura_institucion.id_municipio' => $municipio,
                                            ])
                                            ->distinct()
                                            ->get([
                                                'institucions.id', 
                                                'institucions.nombre_institucion', 
                                                'institucions.director', 
                                                'institucions.contacto',
                                                'institucions.cargo', 
                                                'institucions.telefono',
                                                'institucions.correo', 
                                                'institucions.direciion_local', 
                                                'institucions.direciion_central', 
                                                'institucions.estado', 
                                                'institucions.tipo'
                                            ]);
        }

        if (request('poblacion')){
            // dd(request('poblacion'));
            $instituciones = Institucion::join('poblacion_institucion', 'poblacion_institucion.id_institucion','=','institucions.id')
                            ->where('poblacion_institucion.id_poblacion', request('poblacion'))
                            ->get();
            // dd($instituciones);       
        } else if (request('tipo')) {
            $instituciones = Institucion::where('tipo', request('tipo'))->get();
        } else if (request('eje')) {
            $instituciones = Institucion::join('eje_institucion', 'eje_institucion.id', '=', 'institucions.id')
                            ->where('eje_institucion.id_eje', request('eje'))
                            ->get();
        } else if (request('pais') or request('departamento') or request('municipio')) {
            if (request('pais') != 0 && request('departamento') == 0 && request('municipio') == 0) {
                $instituciones = Institucion::join('cobertura_institucion', 'cobertura_institucion.id_institucion', '=', 'institucions.id')
                                            ->where('cobertura_institucion.id_pais', request('pais'))
                                            ->distinct()
                                            ->get([
                                                'institucions.id', 
                                                'institucions.nombre_institucion', 
                                                'institucions.director', 
                                                'institucions.contacto',
                                                'institucions.cargo', 
                                                'institucions.telefono',
                                                'institucions.correo', 
                                                'institucions.direciion_local', 
                                                'institucions.direciion_central', 
                                                'institucions.estado', 
                                                'institucions.tipo'
                                            ]);
            } else if (request('pais') != 0 && request('departamento') != 0 && request('municipio') == 0) {
                $instituciones = Institucion::join('cobertura_institucion', 'cobertura_institucion.id_institucion', '=', 'institucions.id')
                                            ->where([
                                                'cobertura_institucion.id_pais' => request('pais'),
                                                'cobertura_institucion.id_departamento' => request('departamento')
                                                ])
                                            ->distinct()
                                            ->get([
                                                'institucions.id', 
                                                'institucions.nombre_institucion', 
                                                'institucions.director', 
                                                'institucions.contacto',
                                                'institucions.cargo', 
                                                'institucions.telefono',
                                                'institucions.correo', 
                                                'institucions.direciion_local', 
                                                'institucions.direciion_central', 
                                                'institucions.estado', 
                                                'institucions.tipo'
                                            ]);
            } else if (request('pais') != 0 && request('departamento') != 0 && request('municipio') != 0) {
                $instituciones = Institucion::join('cobertura_institucion', 'cobertura_institucion.id_institucion', '=', 'institucions.id')
                                            ->where([
                                                'cobertura_institucion.id_pais' => request('pais'),
                                                'cobertura_institucion.id_departamento' => request('departamento'),
                                                'cobertura_institucion.id_municipio' => request('municipio')
                                                ])
                                            ->distinct()
                                            ->get([
                                                'institucions.id', 
                                                'institucions.nombre_institucion', 
                                                'institucions.director', 
                                                'institucions.contacto',
                                                'institucions.cargo', 
                                                'institucions.telefono',
                                                'institucions.correo', 
                                                'institucions.direciion_local', 
                                                'institucions.direciion_central', 
                                                'institucions.estado', 
                                                'institucions.tipo'
                                            ]);
            }
            
        }
        else {
            $instituciones = Institucion::where('estado', 1)->get();
        } 
        

        $paises = Pais::where('estado', 1)->get();
        $departamentos = Departamento::where('estado', 1)->get();
        $municipios = Municipio::where('estado', 1)->get();
        $poblaciones = Poblacion::where('estado', 1)->get();
        $ejes = Eje::where('estado', 1)->get();
        $tipos = Tipo::where('estado',1)->get();

        $eliminadas = Institucion::where('estado',0)->get();
        
        return view('instituciones.index', compact(
            'instituciones', 
            'paises',
            'departamentos',
            'municipios',
            'poblaciones',
            'ejes',
            'tipos',
            'eliminadas'
        ));
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
            'user_id' => auth()->user()->id
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

        $paises_guardados = DB::table('pais')
                            ->join('cobertura_institucion','cobertura_institucion.id_pais', '=', 'pais.id')
                            ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                            ->distinct()
                            ->get(['pais.name','pais.id']);

        $departamentos_guardados = DB::table('departamentos')
                                    ->join('cobertura_institucion','cobertura_institucion.id_departamento', '=', 'departamentos.id')
                                    ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                                    ->distinct()
                                    ->get(['departamentos.departamento','departamentos.id', 'cobertura_institucion.id_pais']);

        $municipios_guardados = DB::table('municipios')
                                ->join('cobertura_institucion','cobertura_institucion.id_municipio', '=', 'municipios.id')
                                ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                                ->get(['municipios.municipio','cobertura_institucion.id_departamento','cobertura_institucion.id']); 

        return view('instituciones.show', compact(
            'institucione',
            'tipo', 
            'poblaciones', 
            'ejes', 
            'paises', 
            'departamentos', 
            'municipios', 
            'paises_guardados', 
            'departamentos_guardados', 
            'municipios_guardados'
        ));
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
            'user_id' => auth()->user()->id
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
            'estado' => 0,
            'user_id' => auth()->user()->id
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

        DB::table('cobertura_institucion')->insert([
            'id_institucion' => $institucione->id, 
            'id_pais' => request('id_pais'),
            'id_departamento' => request('id_departamento'),
            'id_municipio' => request('id_municipio')
        ]);

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

    public function destroycobertura($id_cobertura)
    {

        // dd($id_cobertura);
        DB::table('cobertura_institucion')
            ->where('id', '=', $id_cobertura)
            ->delete(); 

        return back()->with('status', 'Cobertura de trabajo eliminada con éxito');
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
        $paises_guardados = DB::table('pais')
                            ->join('cobertura_institucion','cobertura_institucion.id_pais', '=', 'pais.id')
                            ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                            ->distinct()
                            ->get(['pais.name','pais.id']);

        $departamentos_guardados = DB::table('departamentos')
                                    ->join('cobertura_institucion','cobertura_institucion.id_departamento', '=', 'departamentos.id')
                                    ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                                    ->distinct()
                                    ->get(['departamentos.departamento','departamentos.id', 'cobertura_institucion.id_pais']);

        $municipios_guardados = DB::table('municipios')
                                ->join('cobertura_institucion','cobertura_institucion.id_municipio', '=', 'municipios.id')
                                ->where('cobertura_institucion.id_institucion', '=', $institucione->id)
                                ->get(['municipios.municipio','cobertura_institucion.id_departamento','cobertura_institucion.id']); 

        $pdf = PDF::loadview('instituciones.pdfIndivudual', compact(
            'institucione',
            'tipo', 
            'poblaciones', 
            'ejes', 
            'paises', 
            'departamentos', 
            'municipios', 
            'paises_guardados', 
            'departamentos_guardados', 
            'municipios_guardados'
        ));
     
        return $pdf->stream($institucione->nombre_institucion . '.pdf');
        
    }

    public function activar(Institucion $institucione)
    {
        $institucione->update([
            'estado' => 1,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Insititución activada con éxito');
    }
}
