<div>
    <div class="form-group" >
        <label>Pais *</label>
        <select name="id_pais" class="form-control" wire:model="selectedPais">
            <option value="0"> Seleccione un Pais </option>
            @foreach ($paises as $pais)
                <option value="{{ $pais->id }}"> {{ $pais->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <label>Departamento *</label>
        <select name="id_departamento" id="" class="form-control" wire:model='selectedDepartamento'>
            <option value="0"> Todos </option>
            @if ($departamentos)
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}"> {{ $departamento->departamento }} </option>
                @endforeach    
            @endif
        </select>
    </div>    
    <div class="form-group" >
        <label>Municipio *</label>
        <select name="id_municipio" id="" class="form-control" wire:model='selectedMunicipio'>
            <option value="0"> Todos </option>
            @if ($municipios)
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}"> {{ $municipio->municipio }} </option>
                @endforeach    
            @endif
            
        </select>
    </div>
</div>
