@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')
    <h1>Listado de municipios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('municipios.create') }}" class="btn btn-sm btn-secondary">Crear Municipios</a>
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
                    @foreach ($municipios as $key => $municipio)
                    <tr>
                        {{-- <td width = "100px">{{ $pais->id }}</td> --}}
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $municipio->municipio }}</td>
                        <td width ="10px">
                            <a href="{{ route('municipios.edit', $municipio) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width ="10px">
                            <form action="{{ route('municipios.destroy', $municipio) }}" method="POST">
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
    </div>
@endsection
