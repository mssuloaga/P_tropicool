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
            'name' => 'required|min:3|max:20',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
        
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'username.unique'=> 'El usuario ya existe',
            'username.required' => 'El usuario es requerido',
            'email.required' => 'El email es requerido',
            'password.required' => 'La contraseña es requerida'
        ];
    }
}
