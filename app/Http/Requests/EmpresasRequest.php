<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasRequest extends FormRequest
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
            'nombre'=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20',
            'direccion'=> 'required|min:5|max:40',
            'telefono' =>'required|numeric|min:200000000|max:999999999|unique:empresas',
            'mision' => 'required|min:20|max:400',
            'vision'=> 'required|min:20|max:400',
            'descripcion'=> 'required|min:20|max:400',
            'instagram'=> 'required|min:5|max:40',
            'facebook'=> 'required|min:5|max:40'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre  de la empresa es requerido',
            'nombre.min'=> 'El nombre de la empresa debe tener al menos 3 caracteres',
            'nombre.max'=> 'El nombre de la empresa debe tener maximo 20 caracteres',
            'nombre.regex'=> 'El nombre de la empresa solo debe llevar letras',
            'direccion.required' => 'La direccion  de la empresa es requerida',
            'direccion.min'=> 'La direccion de la empresa debe tener al menos 5 caracteres',
            'direccion.max'=> 'El nombre de la empresa debe tener maximo 40 caracteres',
            'telefono.required' => 'El telefono de la empresa es requerido',
            'telefono.min' => 'El telefono de la empresa debe tener al menos 9 numeros',
            'telefono.max' => 'El telefono de la empresa debe tener a lo mas 9 numeros',
            'telefono.unique' => 'Este telefono ya existe',
            'telefono.numeric' => 'Este telefono solo lleva numeros',
            'mision.required' => 'La mision mision  de la empresa es requerida',
            'mision.min'=> 'La mision de la empresa debe tener al menos 3 caracteres',
            'mision.max'=> 'La mision de la empresa debe tener maximo 20 caracteres',
            'vision.required' => 'La vision  de la empresa es requerida',
            'vision.min'=> 'La vision de la empresa debe tener al menos 3 caracteres',
            'vision.max'=> 'La vision de la empresa debe tener maximo 20 caracteres',
            'descripcion.required' => 'La descripcion  de la empresa es requerida',
            'descripcion.min'=> 'La descripcion de la empresa debe tener al menos 3 caracteres',
            'descripcion.max'=> 'La descripcion de la empresa debe tener maximo 20 caracteres',
            'instagram.required' => 'El instagram  de la empresa es requerido',
            'instagram.min'=> 'El instagram de la empresa debe tener al menos 3 caracteres',
            'instagram.max'=> 'El instagram de la empresa debe tener maximo 20 caracteres',
            'facebook.required' => 'El facebook  de la empresa es requerido',
            'facebook.min'=> 'El facebook de la empresa debe tener al menos 3 caracteres',
            'facebook.max'=> 'El facebook de la empresa debe tener maximo 20 caracteres'
            
            
        ];
    }
}
