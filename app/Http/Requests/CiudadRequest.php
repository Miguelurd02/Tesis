<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiudadRequest extends FormRequest
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
            'nombre' => ['required', 'min:2', 'max:20', 'regex:/^[A-Z][A-Za-z\s]+$/', 'alpha','unique:ciudads'],
        ];
    }
    
    public function messages()
    {
        return [
            'nombre.required' => 'El campo Ciudad es obligatorio.',
            'nombre.min' => 'El campo Ciudad debe tener al menos :min caracteres.',
            'nombre.max' => 'El campo Ciudad no puede tener más de :max caracteres.',
            'nombre.regex' => 'El campo Ciudad debe comenzar con una letra mayúscula y solo puede contener letras y espacios.',
            'nombre.alpha' => 'El campo Ciudad solo puede contener letras y espacios.',
            'nombre.unique' => 'La ciudad ingresada ya existe en la base de datos.',
        ];
    }

}
