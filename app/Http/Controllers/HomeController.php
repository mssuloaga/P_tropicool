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
        $data2 = [];

        foreach($productos as $producto){
            $data['label'][]= $producto->nombre;
            $data['data'][]= $producto->cantidad;
        }
        foreach($productos as $producto){
            $data2['label2'][]= $producto->nombre;
            $data2['data2'][]= $producto->precio;
        }
        $data['data']=json_encode($data);
        $data2['data2']=json_encode($data2);
        return view('home',$data,$data2);
    }
}
