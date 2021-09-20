<div>
    <form action="{{route('instituciones.index')}}" method="GET">
        <div class="form-group row">
            <div class="col-md-3">
                <label class="col-form-label">Pais</label>
            </div>
            <div class="col-md-3">
                <label class="col-form-label">Departamento</label>
            </div>
            <div class="col-md-3">
                <label class="col-form-label">Municipio</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <select name="pais" id="" class="form-control" wire:model="selectedPais">
                    <option value="0">Seleccione un pais</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}"> {{ $pais->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="departamento" id="" class="form-control" wire:model='selectedDepartamento'>
                    <option value="0">Seleccione un departamento</option>
                    @if ($departamentos)
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"> {{ $departamento->departamento }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3">
                <select name="municipio" id="" class="form-control" wire:model='selectedMunicipio'>
                    <option value="0">Seleccione un municipio</option>
                    @if ($municipios)
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}"> {{ $municipio->municipio }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3">
                <input type="submit" value="Buscar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
