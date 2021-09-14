<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estado'
    ];

    // Relacion uno a muchos
    public function departamentos() {
        return $this->hasMany('App\Models\Departamento');
    }

    //muchos a muchos
    public function instituciones() {
        return $this->belongsToMany('App\Models\Institucion', 'cobertura_institucion', 'id_pais', 'id_institucion');
    }
}
