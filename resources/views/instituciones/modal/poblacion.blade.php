<form 
    action="{{ route('institucion.poblacion', $institucione) }}"
    method="POST"
    enctype="multipart/form-data"
>
@csrf
@method('PATCH')

    <div class="modal" id="ModalPoblacion" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Agregar Población</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label>Población *</label>
                    <select name="id_poblacion" id="" class="form-control">
                        @foreach ($poblaciones as $poblacion)
                            <option value="{{ $poblacion->id }}"> {{ $poblacion->poblacion }} </option>
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
