<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_institucion',
        'director',
        'contacto',
        'cargo',
        'telefono',
        'correo',
        'direciion_local',
        'direciion_central',
        'estado',
        'tipo',
    ];

    // Relacion muchos a muchos
    public function poblaciones() {
        return $this->belongsToMany('App\Models\Poblacion', 'poblacion_institucion', 'id_institucion', 'id_poblacion');
    }

    public function ejes() {
        return $this->belongsToMany('App\Models\Eje', 'eje_institucion', 'id_institucion', 'id_eje');
    }

    public function paises() {
        return $this->belongsToMany('App\Models\Pais', 'cobertura_institucion', 'id_institucion', 'id_pais',);
    }

    public function departamentos() {
        return $this->belongsToMany('App\Models\Departamento', 'cobertura_institucion', 'id_institucion', 'id_departamento');
    }

    public function municipios() {
        return $this->belongsToMany('App\Models\Municipio', 'cobertura_institucion', 'id_institucion', 'id_municipio');
    }


    //realcion uno a muchos
    public function tipo() {
        return $this->belongsTo('App\Models\Tipo');   
    }
}
