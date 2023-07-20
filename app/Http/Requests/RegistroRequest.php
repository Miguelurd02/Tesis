<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'username' => ['required', 'unique:users,username','min:8','regex:/^\S+$/'],
            'email' => ['required', 'unique:users,email', 'email','ends_with:.com'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[@$!%*#?&.\-])[A-Za-z\d@$!%*#?&.\-]+$/
            '],
            'password_confirmation' => ['required', 'same:password'],
            'rol' => ['required'],
            'acceso' => ['required'],
            
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El campo Nombre de usuario es obligatorio.',
            'username.unique' => 'El Nombre de usuario ya está en uso.',
            'username.min' => 'El campo Nombre de usuario debe tener al menos :min caracteres.',
            'username.regex' => 'El campo Nombre de usuario no puede contener espacios en blanco.',

            'email.required' => 'El campo Correo electrónico es obligatorio.',
            'email.unique' => 'El Correo electrónico ya está en uso.',
            'email.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
            'email.ends_with' => 'El campo Correo electrónico debe terminar con ".com".',

            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'El campo Contraseña debe tener al menos :min caracteres.',
            'password.regex' => 'El campo Contraseña debe contener al menos una letra mayúscula y un carácter especial.',

            'password_confirmation.required' => 'El campo Confirmación de contraseña es obligatorio.',
            'password_confirmation.same' => 'La Confirmación de contraseña no coincide con la contraseña.',
            
            'rol.required' => 'El campo Rol es obligatorio.',
        ];
    }
}
