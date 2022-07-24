<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){

        $producto = Producto::find($request->id);

        Cart::add(
            $producto->id,
            $producto->nombre,
            $producto->precio,
            1,
            array("urlfoto"=>$producto->urlfoto)

        );
        return back()->with('success',"$producto->nombre ¡se ha agregado con éxito al carrito!");

    }

    public function cart(){

        return view('checkout');
    }

    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}
