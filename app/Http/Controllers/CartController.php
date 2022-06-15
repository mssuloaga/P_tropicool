<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop(){
        $products = Producto::all();
        return $products;
        // return view('shop')->withTitle('Tropicool')->with(['products' => $products]);
    }

    public function cart(){
        $cartCollection = \Cart::getContent();
        dd($cartCollection);
        return view('cart')->withTitle('Tropicool')->with(['cartCollection' => $cartCollection]);
    }
}
