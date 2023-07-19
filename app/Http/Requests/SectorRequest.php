<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
            'nombre' => ['required', 'min:2', 'max:20', 'regex:/^[A-Z0-9][A-Za-z0-9\s]+$/', 'unique:sectors'],
            'ciudad_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Sector es obligatorio.',
            'nombre.min' => 'El campo Sector debe tener al menos :min caracteres.',
            'nombre.max' => 'El campo Sector no puede tener más de :max caracteres.',
            'nombre.regex' => 'El campo Sector debe comenzar con una letra mayúscula y no admite caractéres especiales',
            'nombre.unique' => 'La Sector ingresado ya existe en la base de datos.',
            // Resto de los mensajes de error para otras reglas de validación
            'ciudad_id.required' => 'El campo Ciudad es obligatorio.',
        ];
    }
}
