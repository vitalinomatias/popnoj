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
                            <ul>
                                @foreach ($institucione->poblaciones as $key => $poblacion)
                                    <li> {{$poblacion['poblacion']}}</li>     
                                
                                @endforeach
                            </ul>
                            @if(Auth::user( )->rol <>3)
                            <a href="" data-toggle="modal" data-target="#ModalPoblacion" class="btn btn-sm btn-secondary">Agregar Población</a>
                            <a href="" data-toggle="modal" data-target="#ModalPoblacionEliminar" class="btn btn-sm btn-danger">Eliminar Poblaciones</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Cobertura de trabajo</div>
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Pais</th>
                                        <th>Departamento</th>
                                        <th>Municipio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paises_guardados as $pais)
                                        <tr>
                                            <td> {{$pais->name}} </td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        @foreach ($departamentos_guardados as $departamento)
                                                            @if ($departamento->id_pais == $pais->id)
                                                                <tr>
                                                                    <td> {{$departamento->departamento}} </td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                @foreach ($municipios_guardados as $municipio)
                                                                                    @if ($municipio->id_departamento == $departamento->id)
                                                                                        <tr>
                                                                                            <td>&nbsp;</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>                                                                
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        @foreach ($departamentos_guardados as $departamento)
                                                            @if ($departamento->id_pais == $pais->id)
                                                                <tr>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                @foreach ($municipios_guardados as $municipio)
                                                                                    @if ($municipio->id_departamento == $departamento->id)
                                                                                        <tr>
                                                                                            <td> {{$municipio->municipio}} </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>                                                                
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(Auth::user( )->rol <>3)
                            <a href="" data-toggle="modal" data-target="#ModalCobertura" class="btn btn-sm btn-secondary">Agregar Cobertura de la Institución</a>
                            <a href="" data-toggle="modal" data-target="#ModalCoberturaEliminar" class="btn btn-sm btn-danger">Eliminar Cobertura de la Institución</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-user">
                        <div class="card-header">Ejes de trabajo</div>
                        <div class="card-body">
                            <ul>
                                @foreach ($institucione->ejes as $key => $eje)
                                    <li> {{$eje['eje']}} <br></li>     
                                
                                @endforeach
                            </ul>
                            @if(Auth::user( )->rol <>3)
                            <a href="" data-toggle="modal" data-target="#ModalEje" class="btn btn-sm btn-secondary">Agregar Eje de trabajo</a>
                            <a href="" data-toggle="modal" data-target="#ModalEjeEliminar" class="btn btn-sm btn-danger">Eliminar eje de trabajo</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            

        </div>

        <div class="card-footer">
            <a href="{{ route('institucion.imprimir', $institucione) }}" class="btn  btn-success" target="_blank">Imprimir</a>
        </div>
    </div>
    @include('instituciones.modal.poblacion')
    @include('instituciones.modal.eje')
    @include('instituciones.modal.cobertura')
    @include('instituciones.modal.poblacionesEliminar')
    @include('instituciones.modal.ejeEliminar')
    @include('instituciones.modal.coberturaEliminar')
@endsection
