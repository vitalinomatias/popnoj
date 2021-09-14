@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    <h1>Listado de instituciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('instituciones.create') }}" class="btn btn-sm btn-secondary">Crear nueva institución</a>
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
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instituciones as $key => $institucion)
                    <tr>
                        {{-- <td width = "100px">{{ $pais->id }}</td> --}}
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $institucion->nombre_institucion }}</td>
                        <td width ="10px">
                            <a href="{{ route('instituciones.show', $institucion) }}" class="btn btn-success btn-sm">
                                &nbsp;&nbsp;Ver&nbsp;&nbsp;
                            </a>
                        </td>
                        <td width ="10px">
                            <a href="{{ route('instituciones.edit', $institucion) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width ="10px">
                            <form action="{{ route('instituciones.destroy', $institucion) }}" method="POST">
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
