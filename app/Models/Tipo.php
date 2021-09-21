<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'estado',
        'user_id'
    ];

    public function instituciones() {
        return $this->hasMany('App\Models\institucion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
