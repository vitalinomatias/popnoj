<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento',
        'estado',
        'pais'
    ];

    // Relacion uno a muchos (inversa)
    public function pais() {
        return $this->belongsTo('App\Models\Pais');   
    }

    // Relacion uno a muchos
    public function municipios() {
        return $this->hasMany('App\Models\Municipio');
    }

    //muchos a muchos
    public function instituciones() {
        return $this->belongsToMany('App\Models\Institucion', 'cobertura_institucion', 'id_departamento', 'id_institucion');
    }

}
