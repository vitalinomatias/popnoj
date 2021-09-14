<form 
    action="{{ route('institucion.eje', $institucione) }}"
    method="POST"
    enctype="multipart/form-data"
>
@csrf
@method('PATCH')

    <div class="modal" id="ModalEje" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Agregar Eje de trabajo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label>Ejes de trabajo *</label>
                    <select name="id_eje" id="" class="form-control">
                        @foreach ($ejes as $eje)
                            <option value="{{ $eje->id }}"> {{ $eje->eje }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <input type="submit" value="Guardar" class="btn btn-primary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
</form>
