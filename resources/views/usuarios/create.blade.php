@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Crear nuevo Usuario</h1>
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
                action="{{ route('usuarios.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                <div class="form-group" >
                    <label>Nombre *</label>
                    <input type="text" name="name" class="form-control" required value=" {{old('name')}} ">
                </div>

                <div class="form-group" >
                    <label>Nombre de usuario *</label>
                    <input type="text" name="usuario" class="form-control" required value=" {{old('usuario')}} ">
                    @if ($errors->has('usuario'))
                        <span class="error text-danger" for="input-usuario"> {{$errors->first('usuario')}} </span>
                    @endif
                </div>
                <div class="form-group" >
                    <label>Contraseña *</label>
                    <input type="text" name="password" class="form-control" required value=" {{old('password')}} ">
                </div>
                <div class="form-group" >
                    <label>Rol *</label>
                    <select name="rol" id="" class="form-control">
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}"> {{ $rol->rol }} </option>
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