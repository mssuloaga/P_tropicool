<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

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
