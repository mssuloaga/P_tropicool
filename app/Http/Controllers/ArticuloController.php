<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Producto::all();
        return view('articulos.index', [
            'articulos'=>$articulos
        ]);
    }
}
