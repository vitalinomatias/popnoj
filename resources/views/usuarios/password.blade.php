@extends('adminlte::page')

@section('title', 'Tipo de Usuario')

@section('content_header')
    <h1>Editar Contraseña</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('usuarios.passwordUpdate',$usuario) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Contraseña *</label>
                   <input type="text" name="password" class="form-control"> 
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
