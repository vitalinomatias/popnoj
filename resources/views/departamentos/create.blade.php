@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content_header')
    <h1>Crear nuevo departamento</h1>
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
                action="{{ route('departamentos.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="departamento" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Pais *</label>
                    <select name="pais" id="" class="form-control">
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}"> {{ $pais->name }} </option>
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