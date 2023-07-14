<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\Propiedades;

class AccountSettingsNotifications extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-notifications');
  }

  public function mostrarFavoritos()
{
  $usuarioId = auth()->user()->id;
  $favoritos = Favorito::where('users_id', $usuarioId)->get();
  
  // Obtener las propiedades relacionadas con los favoritos
  $propiedades = Propiedades::whereIn('id', $favoritos->pluck('propiedades_id'))->get();

    return view('content.pages.pages-account-settings-notifications', compact('propiedades'));
}

  
public function eliminarFavoritos($id)
{
    $usuarioId = auth()->user()->id;
    
    // Buscar el favorito por el ID de la propiedad y el ID del usuario
    $favorito = Favorito::where('propiedades_id', $id)
        ->where('users_id', $usuarioId)
        ->first();
    
    if ($favorito) {
        // Eliminar el favorito si se encuentra
        $favorito->delete();
        return redirect()->back()->with('success', 'La propiedad se ha eliminado de favoritos correctamente.');
    }
    
    return redirect()->back()->with('error', 'No se pudo encontrar la propiedad en tus favoritos.');
}
}
