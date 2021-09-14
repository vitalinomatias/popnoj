@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    <h1>Editar Institución</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('instituciones.update', $institucione) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="nombre_institucion" class="form-control" required value="{{ old('nombre_institucion', $institucione->nombre_institucion) }}">
                </div>
                <div class="form-group" >
                    <label>Director  *</label>
                    <input type="text" name="director" class="form-control" required value="{{ old('director', $institucione->director) }}">
                </div>
                <div class="form-group" >
                    <label>Contacto *</label>
                    <input type="text" name="contacto" class="form-control" required value="{{ old('contacto', $institucione->contacto) }}">
                </div>
                <div class="form-group" >
                    <label>Cargo *</label>
                    <input type="text" name="cargo" class="form-control" required value="{{ old('cargo', $institucione->cargo) }}">
                </div>
                <div class="form-group" >
                    <label>Telefono *</label>
                    <input type="text" name="telefono" class="form-control" required value="{{ old('telefono', $institucione->telefono) }}">
                </div>
                <div class="form-group" >
                    <label>Correo *</label>
                    <input type="text" name="correo" class="form-control" required value="{{ old('correo', $institucione->correo) }}">
                </div>
                <div class="form-group" >
                    <label>Dirección Local *</label>
                    <input type="text" name="direciion_local" class="form-control" required value="{{ old('direciion_local', $institucione->direciion_local) }}">
                </div>
                <div class="form-group" >
                    <label>Dirección Central *</label>
                    <input type="text" name="direciion_central" class="form-control" required value="{{ old('direciion_central', $institucione->direciion_central) }}">
                </div>
                <div class="form-group" >
                    <label>Tipo *</label>
                    <select name="tipo" id="" class="form-control">
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{$institucione->tipo==$tipo->id ? 'selected': ''}} > {{ $tipo->tipo }} </option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
