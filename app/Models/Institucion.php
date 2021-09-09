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
        return $this->belongsToMany('App\Models\Poblacion');
    }

    public function tipo() {
        return $this->belongsTo('App\Models\Tipo');   
    }
}
