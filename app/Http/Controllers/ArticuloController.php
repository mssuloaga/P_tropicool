<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Producto::all();
        $categorias = Categoria::all();
        return view('articulos.index', [
            'articulos' => $articulos,
            'categorias' => $categorias
        ]);
    }

    public function show($articulosId){
        $articulos = Producto::find($articulosId);
        return view('articulos.show', [
            'articulos' => $articulos
        ]);
    }

    public function busqueda(Request $request){
        $nombre = $request->get('buscarpor');

        $producto = Producto::where('nombre','like',"%$nombre%")->paginate(5);
        return view('articulos.busqueda', [
            'producto' => $producto
        ]);
    }
}
