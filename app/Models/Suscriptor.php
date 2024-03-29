<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    use HasFactory;

    public function user(){
        
        return $this->belongsTo('App\Models\User');
    }

    public function favoritos()
    {
        return $this->hasMany('App\Models\Favorito');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'user_id',
    ];
}
