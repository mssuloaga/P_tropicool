<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'nombre'=> 'required|min:3|max:100',
            'descripcion'=> 'required|min:10|max:200',
            'cantidad'=> 'required|numeric|min:1|max:100',
            'precio'=> 'required|numeric|min:100|max:100000',
            
            
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min'=> 'El nombre del producto debe tener al menos 3 caracteres',
            'nombre.max'=> 'El nombre del producto debe tener maximo 100 caracteres',
            'descripcion.required' => 'La descripcion del producto es requerida',
            'descripcion.min'=> 'La descripción del producto debe tener al menos 10 caracteres',
            'descripcion.max'=> 'La descripción del producto debe tener maximo 200 caracteres',
            'cantidad.required' => 'La cantidad del producto es requerida',
            'cantidad.min'=> 'La cantidad del producto debe ser al menos de 1 unidades',
            'cantidad.max'=> 'La cantidad del producto debe ser a lo mas de 100 unidades',
            'cantidad.numeric'=> 'La cantidad de los producto solo debe llevar números',
            'precio.required' => 'El precio del producto es requerido',
            'precio.min'=> 'El precio del producto debe ser por lo menos de 100 pesos',
            'precio.max'=> 'El precio del producto debe a lo mas de 100000 mil pesos',
            'precio.numeric'=> 'El precio del producto solo debe llevar números',
            
            

            
            
        ];
    }
}
