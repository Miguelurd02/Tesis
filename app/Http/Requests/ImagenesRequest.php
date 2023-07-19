<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenesRequest extends FormRequest
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
            'imagenes' => ['required','array','max:10'],
            'imagenes.*' => ['mimes:jpeg,png,jpg'],
        ];
    }

    public function messages()
    {
        return [
            'imagenes.image' => 'El campo de imágenes debe ser una imagen.',
            'imagenes.mimes' => 'El campo de imágenes debe ser un archivo de tipo JPEG, PNG o JPG.',
            'imagenes.max' => 'El límite máximo de imágenes permitidas es de 10 imágenes por propiedad.',
            'imagenes.required' => 'Es necesario registrar minimo 1 imágen de la propiedad.',
        ];
    }
}
