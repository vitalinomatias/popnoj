@extends('adminlte::page')

@section('title', 'Ejes')

@section('content_header')
    <h1>Listado de Ejes de trabajo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('ejes.create') }}" class="btn btn-sm btn-secondary">Crear Eje de trabajo</a>
            <a href="{{ route('ejes.imprimir') }}" class="btn btn-sm btn-success" target="_blank">Imprimir</a>
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
                    @foreach ($ejes as $key => $eje)
                    <tr>
                        {{-- <td width = "100px">{{ $pais->id }}</td> --}}
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $eje->eje }}</td>
                        <td width ="10px">
                            <a href="{{ route('ejes.edit', $eje) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td width ="10px">
                            <form action="{{ route('ejes.destroy', $eje) }}" method="POST">
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
                    <label class="col-form-label">Ejes eliminadas</label>
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
                        @foreach ($eliminados as $key => $eje)
                        <tr>
                            <td width = "100px">{{ $key }}</td>
                            <td>{{ $eje->eje }}</td>
                            <td> {{$eje->user['usuario']}} </td>
                            <td width ="10px">
                                <form action="{{ route('ejes.activar', $eje) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input 
                                        type="submit" 
                                        value="Activar" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea activar el eje?')"
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
