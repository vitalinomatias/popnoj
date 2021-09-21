<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eje extends Model
{
    use HasFactory;

    protected $fillable = [
        'eje',
        'descripcion',
        'estado',
        'user_id'
    ];

    public function instituciones() {
        return $this->belongsToMany('App\Models\Institucion', 'eje_institucion', 'id_eje', 'id_institucion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
