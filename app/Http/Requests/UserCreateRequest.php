<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UserCreateRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ];
        
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min'=> 'El nombre debe tener al menos 3 caracteres',
            'name.max'=> 'El nombre debe tener maximo 20 caracteres',
            'name.regex'=> 'El nombre solo debe llevar letras',
            'username.required' => 'El usuario es requerido',
            'username.unique'=> 'El usuario ya existe',
            'email.required' => 'El correo es requerido',
            'email.unique'=> 'El correo ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.min'=> 'La contraña debe tener al menos 3 caracteres',
            'password.max'=> 'La contraña debe tener maximo 20 caracteres'
            
        ];
    }
}
