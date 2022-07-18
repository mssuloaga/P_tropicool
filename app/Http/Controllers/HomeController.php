<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos =Producto::all();
        $data = [];

        foreach($productos as $producto){
            $data['label'][]= $producto->nombre;
            $data['data'][]= $producto->cantidad;
        }
        $data['data']=json_encode($data);
        return view('home',$data);
    }
}
