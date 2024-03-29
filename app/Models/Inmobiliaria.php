<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmobiliaria extends Model
{
    use HasFactory;

    public function user(){
        
        return $this->belongsTo('App\Models\User');
    }

    public function agentes(){
        return $this->hasMany('App\Models\Agentes');
    }

    protected $fillable = [
            'nombre',
            'imagen',
            'telefono',
            'rif',
            'email',
            'direccion',
            'descripcion',
            'user_id',  
    ];
}
