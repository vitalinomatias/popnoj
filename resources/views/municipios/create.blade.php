@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')
    <h1>Crear nuevo municipio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form 
                action="{{ route('municipios.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="municipio" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Departamento *</label>
                    <select name="departamento" id="" class="form-control">
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"> {{ $departamento->departamento }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection