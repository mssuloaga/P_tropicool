<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class ContactoController extends Controller
{
    public function index()
    {
        $contacto = Empresa::all();
        return view('contacto.index', [
            'contacto'=>$contacto
        ]);
    }
}
