@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    <h2> {{$institucione->nombre_institucion}} </h2>
@stop

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <p> {{$institucione->nombre_institucion}} </p>
        </div> --}}
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Director</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->director}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Contacto</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->contacto}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Cargo</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->cargo}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Teléfono</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->telefono}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Correo</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->correo}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Tipo</div>
                        <div class="card-body">
                            <p class="description">{{$tipo->tipo}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Dirección central</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->direciion_central}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Dirección Local</div>
                        <div class="card-body">
                            <p class="description">{{$institucione->direciion_local}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Población</div>
                        <div class="card-body">
                            <p class="description">
                                poblacion 1<br>
                                poblacion 2<br>
                                poblacion 3<br>
                                poblacion 4<br>
                                poblacion 5<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Cobertura de trabajo</div>
                        <div class="card-body">
                            <p class="description">
                                Cobertura 1<br>
                                Cobertura 2<br>
                                Cobertura 3<br>
                                Cobertura 4<br>
                                Cobertura 5<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Ejes de trabajo</div>
                        <div class="card-body">
                            <p class="description">
                                eje de trabajo 1<br>
                                eje de trabajo 2<br>
                                eje de trabajo 3<br>
                                eje de trabajo 4<br>
                                eje de trabajo 5<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>

        <div class="card-footer">
        
            <a href="{{ route('instituciones.create') }}" class="btn btn-sm btn-primary">Agregar Población</a>
            <a href="{{ route('instituciones.create') }}" class="btn btn-sm btn-primary">Agregar Eje de trabajo</a>
            <a href="{{ route('instituciones.create') }}" class="btn btn-sm btn-primary">Agregar Cobertura de la Institución</a>
        
        </div>
    </div>
@endsection
