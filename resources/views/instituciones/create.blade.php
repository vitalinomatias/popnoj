@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    <h1>Crear nueva institución</h1>
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
                action="{{ route('instituciones.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="nombre_institucion" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Director  *</label>
                    <input type="text" name="director" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Contacto *</label>
                    <input type="text" name="contacto" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Cargo *</label>
                    <input type="text" name="cargo" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Telefono *</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Correo *</label>
                    <input type="text" name="correo" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Dirección Local *</label>
                    <input type="text" name="direciion_local" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Dirección Central *</label>
                    <input type="text" name="direciion_central" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Tipo *</label>
                    <select name="tipo" id="" class="form-control">
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}"> {{ $tipo->tipo }} </option>
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