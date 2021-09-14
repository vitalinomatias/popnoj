<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol',
    ];

    public function usuarios() {
        return $this->hasMany('App\Models\User','rol');
    }    
}
