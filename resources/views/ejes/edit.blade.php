@extends('adminlte::page')

@section('title', 'Ejes')

@section('content_header')
    <h1>Editar eje de trabajo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('ejes.update', $eje) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="eje" class="form-control" required value="{{ old('eje', $eje->eje) }}">
                </div>
                <div class="form-group" >
                    <label>Descripción *</label>
                    <textarea name="descripcion" rows="6" class="form-control" required >{{ $eje->descripcion }}</textarea>
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
