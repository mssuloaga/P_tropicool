<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:30', 
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la categoria es requerido',
            'nombre.min'=> 'El nombre de la categoria debe tener al menos 3 caracteres',
            'nombre.max'=> 'El nombre de la categoria debe tener maximo 30 caracteres',
            'nombre.regex'=> 'El nombre de la categoria solo debe llevar letras',
        ];
    }
}
