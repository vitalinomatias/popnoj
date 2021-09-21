@extends('adminlte::page')

@section('title', 'Paises')

@section('content_header')
    <h1>Listado de paises</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('paises.create') }}" class="btn btn-sm btn-secondary">Crear Pais</a>
            <a href="{{ route('paises.imprimir') }}" class="btn btn-sm btn-success" target="_blank">Imprimir</a>
        </div>
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
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paises as $key => $pais)
                    <tr>
                        {{-- <td width = "100px">{{ $pais->id }}</td> --}}
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $pais->name }}</td>
                        <td width ="10px">
                            <a href="{{ route('paises.edit', $pais) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width ="10px">
                            <form action="{{ route('paises.destroy', $pais) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input 
                                    type="submit" 
                                    value="Eliminar" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar..?')"
                                >
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (Auth::user( )->rol == 1)
            <div class="card-footer">
                <div>
                    <label class="col-form-label">Paises eliminadas</label>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Eliminado</th>
                            <th colspan="1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eliminados as $key => $pais)
                        <tr>
                            <td width = "100px">{{ $key }}</td>
                            <td>{{ $pais->name }}</td>
                            <td> {{$pais->user['usuario']}} </td>
                            <td width ="10px">  
                                <form action="{{ route('paises.activar', $pais) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input 
                                        type="submit" 
                                        value="Activar" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea activar el pais ?')"
                                    >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
