<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenteRequest extends FormRequest
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
            'nombre' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
            'apellido' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email','ends_with:.com'],
            'inmobiliaria_id' => ['required'],
            'imagen' => ['required','image', 'mimes:jpeg,png'],
            // Resto de las reglas de validación para otros campos
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.min' => 'El campo Nombre debe tener al menos :min caracteres.',
            'nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
            'nombre.regex' => 'El campo Nombre debe comenzar con una letra mayúscula y no admite espacios, números o caractéres especiales',
            // Resto de los mensajes de error para otras reglas de validación

            'apellido.required' => 'El campo Apellido es obligatorio.',
            'apellido.min' => 'El campo Apellido debe tener al menos :min caracteres.',
            'apellido.max' => 'El campo Apellido no puede tener más de :max caracteres.',
            'apellido.regex' => 'El campo Apellido debe comenzar con una letra mayúscula y no admite espacios, números o caractéres especiales',
            // Resto de los mensajes de error para otras reglas de validación

            'telefono.required' => 'El campo Teléfono es obligatorio.',
            'telefono.numeric' => 'El campo Teléfono debe ser numérico.',
            'telefono.digits' => 'El campo Teléfono debe tener :digits dígitos.',

            'email.required' => 'El campo Correo electrónico es obligatorio.',
            'email.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
            'email.ends_with' => 'El campo Correo electrónico debe terminar con ".com".',

            'inmobiliaria_id.required' => 'El campo Inmobiliaria es obligatorio.',

            'imagen.required' => 'El campo Imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe tener una de las siguientes extensiones: jpeg, png.',
        ];
    }
}
