@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')
    <h1>Editar municipio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('municipios.update', $municipio) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="municipio" class="form-control" required value="{{ old('municipio', $municipio->municipio) }}">
                </div>
                <div class="form-group" >
                    <label>Departamento *</label>
                    <select name="departamento" id="" class="form-control">
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{$municipio->departamento==$departamento->id ? 'selected': ''}} > {{ $departamento->departamento }}  </option>
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
