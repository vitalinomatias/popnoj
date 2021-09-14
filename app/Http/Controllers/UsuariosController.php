<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $users = user::where('estado', 1)->get();
        //return view('usuarios.index', compact('users'));
        //dd();
        //$roles=roles::;
        
        $nombre = $request->get('buscarpor');
        $rol = $request->get('buscarporrol');
    
        //$users = user::where('name','like',"%$rol%")->paginate(5);
        $users = User::name($nombre)->rol($rol)->where('estado',1)->paginate(5);
        
        return view('usuarios.index', compact('users'));
    
    }

    public function imprimir()
    {
       // $users = user::where('estado', 1)->get();
        //return view('usuarios.index', compact('users'));
        //dd();
        //$roles=roles::;
            
        //$nombre = $request->get('buscarpor');
        //$rol = $request->get('buscarporrol');
    
        //$users = user::where('name','like',"%$rol%")->paginate(5);
        //$users = User::name($nombre)->rol($rol)->where('estado',1)->paginate(5);
        $users = User::where('estado', 1)->get();
       
        $pdf = PDF::loadview('pdf', compact('users'));
        return $pdf->stream('usuarios.pdf');
       
    
    }

    public function create()
    {
        $roles = roles::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $usuario = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'rol' => request('rol'),
            'estado' => 1
        ]);

        return redirect()->route('usuarios.index')->with('status', 'Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(user $usuarios)
    {
        return view('usuarios.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(user $usuario)
    {
        $roles=roles::all();
        return view('usuarios.edit',compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        
        $usuario->update([
            'name' => request('name'),
            'email'=>request('email'),
            'rol' => request('rol'),

        ]);
        
        return redirect()->route('usuarios.index')->with('status', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->update([
            'estado' => 0
        ]);

        return back()->with('status', 'Usuario eliminado con éxito');
    }
}
