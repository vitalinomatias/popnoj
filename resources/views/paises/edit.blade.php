@extends('adminlte::page')

@section('title', 'Paises')

@section('content_header')
    <h1>Editar pais</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('paises.update', $paise) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name', $paise->name) }}">
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
