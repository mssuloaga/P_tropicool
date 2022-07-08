<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Producto;
use App\Categoria;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;

class ProductsImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnError
{
    use Importable, SkipsErrors;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
       foreach ($collection as $row) {
        $categoria = Categoria::firstWhere('nombre', trim($row['categoria']));
        
        if ($categoria == null && trim($row['categoria']) != null) {
            $categoria = new Categoria();
            $categoria->nombre = trim($row['categoria']);
            $categoria->id_empresas=1;
            $categoria->save();
        }
        $producto = Producto::create([
            'nombre' => trim($row['nombre']),
            'descripcion' => trim($row['descripcion']),
            'precio' => trim($row['precio']),
            'cantidad' => trim($row['cantidad']),
            'id_categorias' => $categoria->id,
            
        ]);
       }
    }
    public function rules(): array {
        return [
            "*.nombre" => ['required', 'string', 'max:50'],
            "*.decripcion" => ['nullable', 'string', 'max:2000'],
            "*.precio" => ['required','numeric','min:0','max:100000'],
            "*.cantidad" => ['nullable'],
            "*.categoria" => ['required'],
        ];
    }
}
