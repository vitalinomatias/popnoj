@extends('adminlte::page')

@section('title', 'Poblaciones')

@section('content_header')
    <h1>Editar población</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('poblaciones.update', $poblacione) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="poblacion" class="form-control" required value="{{ old('poblacion', $poblacione->poblacion) }}">
                </div>
                <div class="form-group" >
                    <label>Descripción *</label>
                    <textarea name="descripcion" rows="6" class="form-control" required >{{ $poblacione->descripcion }}</textarea>
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
