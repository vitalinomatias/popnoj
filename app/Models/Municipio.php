<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipio',
        'estado',
        'departamento',
        'user_id'
    ];

    public function departamentoNombre() {
        return $this->belongsTo('App\Models\Departamento','departamento');   
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //muchos a muchos
    public function instituciones() {
        return $this->belongsToMany('App\Models\Institucion', 'cobertura_institucion', 'id_municipio', 'id_institucion');
    }
}
