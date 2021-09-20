@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    <h1>Listado de instituciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <a href="{{ route('instituciones.create') }}" class="btn btn-sm btn-secondary">Crear nueva institución</a>
                <a href="{{ route('instituciones.imprimir') }}" class="btn btn-sm btn-success" target="_blank">Imprimir</a>
            </div>            
            @livewire('busqueda-cobertura')
            <form action="{{route('instituciones.index')}}" method="GET">
                <div>
                    <label class="col-form-label">Población:</label>
                </div>
                <div class="form-group row">  
                    <div class="col-md-9" >
                        <select name="poblacion" id="" class="form-control">
                            <option value="0">Seleccione un tipo de población</option>
                            @foreach ($poblaciones as $poblacion)
                                <option value="{{ $poblacion->id }}"> {{ $poblacion->poblacion }} </option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="col-md-3">
                        <input type="submit" value="Buscar" class="btn  btn-primary mb-2">
                    </div>
                </div>
            </form>
            <form action="{{route('instituciones.index')}}" method="GET">
                <div>
                    <label class="col-form-label">Tipo de Institución</label>
                </div>
                <div class="form-group row">
                    <div class="col-md-9">
                        <select name="tipo" id="" class="form-control">
                            <option value="0">Seleccione un tipo de institución</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}"> {{ $tipo->tipo }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="Buscar" class="btn  btn-primary mb-2">
                    </div>
                </div>
            </form>
            <form action="{{route('instituciones.index')}}" method="GET">
                <div>
                    <label class="col-md-9">Ejes de trabajo</label>
                </div>
                <div class="form-group row">
                    <div class="col-md-9" >      
                        <select name="eje" id="" class="form-control">
                            <option value="0">Seleccione un eje de trabajo</option>
                            @foreach ($ejes as $eje)
                                <option value="{{ $eje->id }}"> {{ $eje->eje }} </option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="col-md-3">
                        <input type="submit" value="Buscar" class="btn  btn-primary">
                    </div>
                </div>
            </form>
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
                        @if(Auth::user( )->rol <>3)
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
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(Auth::user( )->rol == 1)
        <div class="card-footer">
            <div>
                <label class="col-form-label">Instituciones eliminadas</label>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="1">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eliminadas as $key => $institucion)
                    <tr>
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $institucion->nombre_institucion }}</td>
                        <td width ="10px">
                            <form action="{{ route('instituciones.activar', $institucion) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input 
                                    type="submit" 
                                    value="Activar" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea activar la institución?')"
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
