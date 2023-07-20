<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Inmobiliaria;
use App\Models\Suscriptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    if(Auth::check()){
      $user = Auth::user();
      return $this->authenticated(request(), $user);
    }
    return view('content.authentications.auth-login-basic');
  }

  public function login(LoginRequest $request){
    $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('/auth/login-basic')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
  }

  public function authenticated(Request $request, $user){

    if($user->rol=='inmobiliaria'){

      $detallesInmobiliaria = Inmobiliaria::where('user_id', $user->id)->first();
 
        if ($detallesInmobiliaria) {
          if($user->acceso == 0){
            // Si el usuario está registrado, redirigir a la página de detalles
            return redirect('/detalles/desactivada')->with('rol', $user->rol);
          } else {
            return redirect('/inicio/inmobiliaria')->with('rol', $user->rol);
            dd($detallesInmobiliaria->acceso);
          }
      } else {
          // Si el usuario no está registrado, redirigir al formulario de registro
          return redirect('/detalles/inmobiliarias')->with('rol', $user->rol);
      };
    }
    elseif($user->rol=='suscriptor'){

        $detallesSuscriptor = Suscriptor::where('user_id', $user->id)->first();

        if ($detallesSuscriptor) {
          // Si el usuario está registrado, redirigir a la página de detalles
          return redirect('/inicio/filtro')->with('rol', $user->rol);
      } else {
          // Si el usuario no está registrado, redirigir al formulario de registro
          return redirect('/detalles/suscriptor')->with('rol', $user->rol);
      }
    }
    elseif($user->rol=='admin'){
      return redirect('/admin-inicio')->with('rol', $user->rol);
    }
    
  }
}
