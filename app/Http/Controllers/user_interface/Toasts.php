<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedades;
use App\Models\Suscriptor;
use App\Models\User;
use App\Mail\EnviarMensaje;
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

        return view('content.user-interface.ui-toasts', compact('propiedades'));
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
}
