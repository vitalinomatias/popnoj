@extends('adminlte::page')

@section('title', 'Tipo Institución')

@section('content_header')
    <h1>Crear nueva población</h1>
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
                action="{{ route('poblaciones.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="poblacion" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label>Descripción *</label>
                    <textarea name="descripcion" rows="6" class="form-control" required></textarea>
                </div>
                
                <div class="form-group">
                    @csrf
                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection