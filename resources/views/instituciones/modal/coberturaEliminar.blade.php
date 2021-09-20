<div class="modal" id="ModalCoberturaEliminar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Eliminar Cobertura de trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <table class="table">
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
                                                                            <td>
                                                                                <form action="{{ route('institucion.cobertura_eliminar', $municipio->id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <input
                                                                                        type="submit"
                                                                                        value="Eliminar"
                                                                                        class="btn btn-sm btn-danger"
                                                                                        onclick="return confirm('¿Desea eliminar..?')"
                                                                                    >
                                                                                </form>
                                                                            </td>
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
        </div>
        {{$municipios_guardados}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
