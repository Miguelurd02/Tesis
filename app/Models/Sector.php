<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    public function ciudad(){
        
        return $this->belongsTo('App\Models\Ciudad');
    }

    public function propiedades(){
        return $this->hasMany('App\Models\Propiedades');
    }

    protected $fillable = [
        'nombre',
        'ciudad_id',
    ];
}
