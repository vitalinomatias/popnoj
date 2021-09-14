<div class="modal" id="ModalPoblacionEliminar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Eliminar Población</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Población</th>
                        <th colspan="1">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institucione->poblaciones as $key => $poblacion)
                        <tr>
                            <td width = "100px">{{ $key }}</td>
                            <td> {{$poblacion['poblacion']}} </td>
                            <td width ="10px">
                                <form action="{{ route('institucion.poblacion_eliminar',  [$institucione, $poblacion['id']]  ) }}" method="POST"> 
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
