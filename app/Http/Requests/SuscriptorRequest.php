<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuscriptorRequest extends FormRequest
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
            'user_id' => ['required'],
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
        ];
    }
}
