<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'poblacion',
        'descripcion',
        'estado',
        'user_id'
    ];

    public function instituciones() {
        return $this->belongsToMany('App\Models\Institucion', 'poblacion_institucion', 'id_poblacion', 'id_institucion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
