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
            'titulo' => 'required',
            'imagen' => 'required',
            'contrato' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'sector_id' => 'required',
            'dimension' => 'required',
            'banos' => 'required',
            'habitaciones' => 'required',
            'estacionamiento' => 'required',
            'precio' => 'required',
            'agentes_id' => 'required',
            'plantas' => 'required',            
        ];
    }
}
