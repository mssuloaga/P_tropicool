<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesCreateRequest extends FormRequest
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
            'name' => 'required|unique:roles|min:3|max:20',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'El nombre del rol es requerido',
            'name.unique'=> 'El rol ya existe',
            'name.min'=> 'El nombre del rol debe tener al menos 3 caracteres',
            'name.max'=> 'El El nombre del rol debe tener maximo 20 caracteres',
            
        ];
    }

}
