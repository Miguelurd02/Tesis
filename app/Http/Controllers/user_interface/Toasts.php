<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedades;
use App\Models\Suscriptor;
use App\Models\User;
use App\Mail\EnviarMensaje;
use App\Models\Favorito;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class Toasts extends Controller
{
    public function index()
    {
        return view('content.user-interface.ui-toasts');
    }

    public function show($id)
    {
        $propiedades = Propiedades::with('agentes', 'imagenes')->findOrFail($id);

        // Verifica si la propiedad está agregada a favoritos para el usuario actual
        $esFavorita = $propiedades->favoritos->contains('users_id', auth()->user()->id);

        return view('content.user-interface.ui-toasts', compact('propiedades', 'esFavorita'));
    }

    public function send(Request $request)
    {
        $userId = Auth::id();
        $propiedadId = $request->input('propiedadId');

       // Obtener el correo electrónico del usuario 
       $correo = User::find($userId)->email;
       // Obtener la imagen de la propiedad
       $imagen =  Propiedades::find($propiedadId)->imagen;
       // Obtener el nombre de la propiedad
       $propiedad_nombre = Propiedades::find($propiedadId)->titulo;
      
        // Obtener los datos del suscriptor desde la base de datos
        $suscriptor = Suscriptor::where('user_id', $userId)->first();

        if ($suscriptor) {
            $nombre = $suscriptor->nombre;
            $apellido = $suscriptor->apellido;
            $telefono = $suscriptor->telefono;
          

            // Crear una nueva instancia de EnviarMensaje con los datos del suscriptor
            $correo = new EnviarMensaje($nombre, $apellido, $correo, $telefono, $propiedadId, $imagen, $propiedad_nombre, $request->input('mensaje'));

            // Enviar el correo electrónico
            Mail::to('victor.aranaf92@gmail.com')->send($correo);

            // Mostrar un mensaje de éxito
            session()->flash('success', 'El correo ha sido enviado satisfactoriamente');
        } else {
            // Mostrar un mensaje de error si no se encuentra el suscriptor en la base de datos
            session()->flash('error', 'No se encontraron los datos del suscriptor');
        }

        return redirect()->back();
    }

        public function marcarDesmarcarFavorito(Request $request)
        {
            $propiedadId = $request->input('propiedades_id');
            $usuarioId = auth()->user()->id;
          
            // Verificar si la propiedad ya está marcada como favorita para el usuario actual
            $favorito = Favorito::where('propiedades_id', $propiedadId)
                ->where('users_id', $usuarioId)
                ->first();
    
            if ($favorito) {
                // La propiedad ya está marcada como favorita, entonces la eliminamos
                $favorito->delete();
                $mensaje = 'La propiedad se ha desmarcado como favorita.';
                $accion = 'desmarcar';
            } else {
                // La propiedad no está marcada como favorita, entonces la agregamos
                $favorito = new Favorito();
                $favorito->propiedades_id = $propiedadId;
                $favorito->users_id = $usuarioId;
                $favorito->save();
                $mensaje = 'La propiedad se ha marcado como favorita.';
                $accion = 'marcar';
            }
            return redirect()->back();
        
        
    }
    


}
