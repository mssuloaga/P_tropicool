<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'nombre' => $row['0'],
            'descripcion' => $row['1'],
            'precio' => $row['2'],
            'cantidad' => $row['3'],
            'imagen' => $row['4'],
            'id_categorias' => $row['5'],
        ]);
    }
}
