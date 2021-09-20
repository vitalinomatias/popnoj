@extends('adminlte::page')

@section('title', 'Tipo de Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('usuarios.update',$usuario) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                   <input type="text" name="name" class="form-control" required value="{{ old('name', $usuario->name) }}"> 
                </div>
                <div class="form-group">
                    <label>Usuario *</label>
                   <input type="text" name="username" class="form-control" required value="{{ old('username', $usuario->username) }}"> 
                </div>
                <div class="form-group">
                    <label>Rol *</label>
                    <select name="rol" class="form-control">
                        @foreach ($roles as $rol)
                        <option value="{{$rol->id}}"{{$usuario->rol==$rol->id ? 'selected':''}}>{{$rol->rol}} </option>
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
