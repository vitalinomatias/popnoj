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
        'pais',
        'user_id'
    ];

    // Relacion uno a muchos (inversa)
    public function paisnombre() {
        return $this->belongsTo('App\Models\Pais','pais','id');   
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
