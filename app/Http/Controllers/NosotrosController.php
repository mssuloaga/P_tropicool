<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class NosotrosController extends Controller
{
    public function index()
    {
        $nosotros = Empresa::all();
        return view('nosotros.index', [
            'nosotros'=>$nosotros
        ]);
    }
}
