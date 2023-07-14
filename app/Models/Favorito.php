<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';

    protected $fillable = [
        'propiedades_id',
        // Otros campos asignables
    ];

    public function propiedad()
    {
        return $this->belongsTo('App\Models\Propiedades');
    }

    public function suscriptor()
    {
        return $this->belongsTo('App\Models\Suscriptor');
    }

}
