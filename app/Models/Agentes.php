<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    use HasFactory;

    public function inmobiliaria(){
        
        return $this->belongsTo('App\Models\Inmobiliaria');
    }

    public function propiedades(){
        return $this->hasMany('App\Models\Propiedades');
    }

    protected $fillable = [
            'nombre',
            'apellido',
            'email',
            'telefono',
            'imagen',
            'inmobiliaria_id',
    ];
}
