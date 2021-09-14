<div class="modal" id="ModalEjeEliminar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Eliminar Eje de trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Eje de trabajo</th>
                        <th colspan="1">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institucione->ejes as $key => $eje)
                        <tr>
                            <td width = "100px">{{ $key }}</td>
                            <td> {{$eje['eje']}} </td>
                            <td width ="10px">
                                <form action="{{ route('institucion.eje_eliminar',  [$institucione, $eje['id']]  ) }}" method="POST"> 
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
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
