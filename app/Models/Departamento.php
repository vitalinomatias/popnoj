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
}
