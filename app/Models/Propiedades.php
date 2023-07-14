<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function imagenes(){
        return $this->hasMany('App\Models\Imagenes');
    }

    public function agentes(){
        
        return $this->belongsTo('App\Models\Agentes');
    }

    public function sector(){
        
        return $this->belongsTo('App\Models\Sector');
    }

    public function favoritos()
    {
        return $this->hasMany('App\Models\Favorito');
    }
    
}
