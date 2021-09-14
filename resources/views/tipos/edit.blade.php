@extends('adminlte::page')

@section('title', 'Tipo de Institución')

@section('content_header')
    <h1>Editar tipo de institución</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('tipos.update', $tipo) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="tipo" class="form-control" required value="{{ old('tipo', $tipo->tipo) }}">
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
