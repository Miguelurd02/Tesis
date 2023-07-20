<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmobiliariaRequest extends FormRequest
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
            'nombre' => [ 'min:2', 'max:25', 'regex:/^[A-Z].*$/'],
            'imagen' => [ 'mimes:jpeg,png,jpg'],
            'telefono' => [ 'numeric', 'digits:10'],
            'rif' => [ 'numeric', 'digits:9', 'unique:inmobiliarias'],
            'email' => [ 'email', 'ends_with:.com','unique:users'],
            'direccion' => [ 'min:10', 'max:150'],
            'descripcion' => [ 'min:50', 'max:400'],
            'user_id' => [], 
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.min' => 'El campo Nombre debe tener al menos :min caracteres.',
            'nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
            'nombre.regex' => 'El campo Nombre debe comenzar con una letra mayúscula.',
        
            'telefono.required' => 'El campo Teléfono es obligatorio.',
            'telefono.numeric' => 'El campo Teléfono debe ser numérico.',
            'telefono.digits' => 'El campo Teléfono debe tener :digits dígitos.',

            'email.required' => 'El campo Email es obligatorio.',
            'email.email' => 'El campo Email debe ser una dirección de correo válida.',
            'email.ends_with' => 'El campo Email debe terminar con ".com".',

            'imagen.required' => 'El campo Imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe tener una de las siguientes extensiones: JPEG, PNG o JPG.',

            'user_id.required' => 'El campo RIF es obligatorio.',
            
            'rif.required' => 'El campo RIF es obligatorio.',
            'rif.numeric' => 'El campo RIF debe ser un número.',
            'rif.digits' => 'El campo RIF debe tener :digits dígitos.',

            'direccion.required' => 'El campo Dirección es obligatorio.',
            'direccion.max' => 'El campo Dirección no puede exceder los :max caracteres.',
            'direccion.min' => 'El campo Dirección debe tener al menos :min caracteres.',

            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'descripcion.min' => 'El campo Descripción debe tener al menos :min caracteres.',
            'descripcion.max' => 'El campo Descripción no puede exceder los :max caracteres.',
        ];
    }


}
