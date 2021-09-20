
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de Usuarios registrados</h1>
@stop

@section('content')
    <div class="card">

    @if(Auth::user()->rol <>3)
        <div class="card-header">
        
            <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-secondary">Crear Usuario</a>
        </div>
             {{-- <nav class="navbar navbar-light float-right"> --}}

             {{-- <form class="form-inline">
                 <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar nombre" aria-label="Search">
                 <input name="buscarporrol" class="form-control mr-sm-2" type="search" placeholder="Buscar por Rol" aria-label="Search">

                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        <a href="{{ route('descargarPDFusuarios') }}" class="btn btn-primary btn-sm">
                                Reporte2
                            </a>
             </form>   --}}
              
            {{-- </nav> --}}
    @endif
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>ROL</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>             
                    @foreach ($users as $key => $user)
                    <tr>
                        {{-- <td width = "100px">{{ $users->id }}</td> --}}
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td> {{$user->rolNombre['rol']}} </td>
                        @if(Auth::user()->rol <>3)                        
                        <td width ="10px">
                            <a href="{{ route('usuarios.passwordEdit', $user) }}" class="btn btn-primary btn-sm">
                                Contraseña
                            </a>
                        </td>
                        @endif
                        @if(Auth::user()->rol <>3)                        
                        <td width ="10px">
                            <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        @endif

                        @if(Auth::user()->rol <> 3)
                        <td width ="10px">
                            <form action="{{ route('usuarios.destroy', $user) }}" method="POST">
                            @csrf
                             @method('delete')
                             <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" unclick="return confirm ('desea eliminar?')">
                            </form> 
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection
