<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadRequest extends FormRequest
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
            
            'titulo' => ['required', 'min:4', 'max:50', 'regex:/^[A-Z][A-Za-z\s]+$/'],
            'imagen' => ['required','image', 'mimes:jpeg,png,jpg'],
            'tipo' => ['required'],
            'dimension' => ['required', 'numeric'],
            'banos' => ['required','numeric'],
            'estacionamiento' => ['required','numeric'],
            'descripcion' => ['required', 'min:50', 'max:1200'],
            'plantas' => ['required','numeric'],
            'habitaciones' => ['required','numeric'],
            'precio' => ['required', 'numeric'],
            'contrato' => ['required'],
            'agentes_id' => ['required'],
            'sector_id' => ['required'],
            // Resto de las reglas de validación para otros campos          
        ];
    }

    public function messages()
    {
        return [

            'titulo.required' => 'El campo de título es obligatorio.',
            'titulo.min' => 'El campo de título debe tener al menos :min caracteres.',
            'titulo.max' => 'El campo de título no debe exceder los :max caracteres.',
            'titulo.regex' => 'El formato del campo de título debe comenzar con mayúscula y solo puede contener letras y espacios en blanco',

            'imagen.image' => 'El campo de imagen debe ser una imagen.',
            'imagen.mimes' => 'El campo de imagen debe ser un archivo de tipo JPEG, PNG o JPG.',
            'imagen.required' => 'No se ha ingresado una imágen promocional.',

            'tipo.required' => 'El campo de Tipo de inmueble es obligatorio.',

            'dimension.required' => 'El campo de dimensión es obligatorio.',
            'dimension.numeric' => 'El campo de dimensión debe ser un valor numérico.',

            'banos.required' => 'El campo de baños es obligatorio.',
            'banos.numeric' => 'El campo de baños debe ser un valor numérico.',

            'estacionamiento.required' => 'El campo de estacionamiento es obligatorio.',
            'estacionamiento.numeric' => 'El campo de estacionamiento debe ser un valor numérico.',

            'descripcion.required' => 'El campo de descripción es obligatorio.',
            'descripcion.min' => 'El campo de descripción debe tener al menos :min caracteres.',
            'descripcion.max' => 'El campo de descripción no debe exceder los :max caracteres.',

            'plantas.required' => 'El campo de plantas es obligatorio.',
            'plantas.numeric' => 'El campo de plantas debe ser un valor numérico.',

            'habitaciones.required' => 'El campo de habitaciones es obligatorio.',
            'habitaciones.numeric' => 'El campo de habitaciones debe ser un valor numérico.',

            'precio.required' => 'El campo de precio es obligatorio.',
            'precio.numeric' => 'El campo de precio debe ser un valor numérico.',

            'contrato.required' => 'El campo de Tipo de contrato es obligatorio.',

            'agentes_id.required' => 'El campo de agentes es obligatorio.',

            'sector_id.required' => 'El campo de sector es obligatorio.',
        ];
    }
}
