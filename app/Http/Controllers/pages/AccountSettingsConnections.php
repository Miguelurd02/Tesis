<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccountSettingsConnections extends Controller
{
  public function index()
  {
    $user = auth()->user();
    return view('content.pages.pages-account-settings-connections', compact('user'));
  }

      public function cambiarContrasena(Request $request)
      {
        
        $user = auth()->user();
        $id = $user->id;
        $users = User::find($id);

        $rules = [
          'new_password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[@$!%*#?&.\-])[A-Za-z\d@$!%*#?&.\-]+$/
            '],
          // Resto de las reglas de validación para otros campos
      ];
    
      $messages = [
        'new_password.required' => 'El campo Contraseña es obligatorio.',
        'new_password.min' => 'El campo Contraseña debe tener al menos :min caracteres.',
        'new_password.regex' => 'El campo Contraseña debe contener al menos una letra mayúscula y un carácter especial.',
      ];
      
      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

          if (!Hash::check($request->password, $users->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }
        
        if($request->new_password != $request->confirm_password){
          return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }

        $users->password = $request->new_password;
        //dd(Hash::check($request->password_new, $temp));
        $users->save();

        return redirect()->back()->with('success', '¡Contraseña cambiada exitosamente!');

      }

}
