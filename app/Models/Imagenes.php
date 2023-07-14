<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    public function propiedades(){
        return $this->belongsTo('App\Models\Propiedades');
    }

    protected $fillable = [
        'imagenes'  
    ];
}
