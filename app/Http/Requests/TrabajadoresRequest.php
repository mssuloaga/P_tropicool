<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadoresRequest extends FormRequest
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
            'rut_trabajador'=> 'required|numeric|min:9999999|max:26000000|unique:trabajadores',
            'direccion'=> 'required|min:5|max:40',
            'telefono' =>'required|numeric|min:200000000|max:999999999|unique:trabajadores',
            'email' => 'required|email|unique:trabajadores',
            'sueldo' =>'required|numeric|min:300000|max:1000000',
            'cargo' => 'required|min:4|max:20',
            'fecha_ingreso'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre  del trabajador es requerido',
            'nombre.min'=> 'El nombre del trabajador debe tener al menos 3 caracteres',
            'nombre.max'=> 'El nombre del trabajador debe tener maximo 20 caracteres',
            'nombre.regex'=> 'El nombre del trabajador solo debe llevar letras',
            'rut_trabajador.required' => 'El rut del trabajador es requerido',
            'rut_trabajador.min' => 'El rut del trabajador debe tener al menos 7 numeros',
            'rut_trabajador.max' => 'El rut del trabajador debe tener a lo mas 8 numeros',
            'rut_trabajador.unique' => 'Este rut de trabajador ya existe',
            'rut_trabajador.numeric' => 'Este rut del trabajdor solo lleva numeros',
            'direccion.required' => 'La direccion  del trabajador es requerida',
            'direccion.min'=> 'La direccion del trabajador debe tener al menos 5 caracteres',
            'direccion.max'=> 'El nombre del trabajador debe tener maximo 40 caracteres',
            'telefono.required' => 'El telefono del trabajador es requerido',
            'telefono.min' => 'El telefono del trabajador debe tener al menos 9 numeros',
            'telefono.max' => 'El telefono del trabajador debe tener a lo mas 9 numeros',
            'telefono.unique' => 'Este telefono de trabajador ya existe',
            'telefono.numeric' => 'Este telefono del trabajdor solo lleva numeros',
            'email.required' => 'El correo del trabajador es requerido',
            'email.unique'=> 'El correo ya existe',
            'sueldo.required' => 'El sueldo del trabajador es requerido',
            'sueldo.min' => 'El sueldo del trabajador debe ser de al menos 300.000 pesos',
            'sueldo.max' => 'El sueldo del trabajador debe ser a lo mas de 1.000.000 de pesos',
            'sueldo.numeric' => 'Este sueldo del trabajdor solo lleva numeros',
            'cargo.required' => 'El cargo  del trabajador es requerido',
            'cargo.min'=> 'El cargo del trabajador debe tener al menos 4 caracteres',
            'cargo.max'=> 'El cargo del trabajador debe tener maximo 20 caracteres',
            'fecha_ingreso.required' => 'El la fecha de ingreso del trabajador es requerida',
            
        ];
    }
}
