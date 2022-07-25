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
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20', 
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min'=> 'El nombre debe tener al menos 3 caracteres',
            'nombre.max'=> 'El nombre debe tener maximo 20 caracteres',
            'nombre.regex'=> 'El nombre solo debe llevar letras',
        ];
    }
}
