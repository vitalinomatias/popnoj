<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Pais;
use Livewire\Component;

class BusquedaCobertura extends Component
{
    public $selectedPais = null, $selectedDepartamento = null, $selectedMunicipio = null;

    public $departamentos = null, $municipios = null;

    public function render()
    {
        return view('livewire.busqueda-cobertura',[
            'paises' => Pais::where('estado', 1)->get()
        ]);
    }

    public function updatedselectedPais($idPais)
    {
        $this->departamentos = Departamento::where('pais', $idPais)->get();
    }

    public function updatedselectedDepartamento($idDepartamento)
    {
        $this->municipios = Municipio::where('departamento', $idDepartamento)->get();
    }
}
