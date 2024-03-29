<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => ['required','regex:/^[\pL\s\-]+$/u','min:3','max:20'],

            'username' => ['required', 'min:3', 'unique:users,username,' . $user->id],
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id
            ],
            'password' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'username.unique'=> 'El usuario ya existe',
            'name.regex'=> 'El nombre solo debe llevar letras', 
            'username.required' => 'El usuario es requerido',
            'email.required' => 'El correo es requerido',
            'email.unique'=> 'El correo ya existe',
            'password.required' => 'La contraseña es requerida'
        ];
    }
}
