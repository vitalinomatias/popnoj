<form 
    action="{{ route('institucion.cobertura', $institucione) }}"
    method="POST"
    enctype="multipart/form-data"
>
@csrf
@method('PATCH')

    <div class="modal" id="ModalCobertura" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Agregar Cobertura</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @livewire('cobertura-component')
            </div>
            <div class="modal-footer">
            <input type="submit" value="Guardar" class="btn btn-primary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
</form>