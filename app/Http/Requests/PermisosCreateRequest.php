<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisosCreateRequest extends FormRequest
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
            'name' => 'required|unique:permissions|min:3|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.unique'=> 'El nombre ya existe',
        ];
    }
}
