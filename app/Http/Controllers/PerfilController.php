<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil.index');
    }

    public function changePassword(Request $request){
        $Perfil = Auth::user();

        if($request->password_actual !=""){
            $NewPass = $request->password;
            $confirPass = $request->confirm_password;
            if($NewPass == $confirPass){
                if(strlen($NewPass) >= 8){
                    $Perfil -> name = $request->input('name');
                    $Perfil -> username = $request->input('username');
                    $Perfil -> email = $request->input('email');
                    $Perfil-> password = bcrypt($request->input('password'));
                    $Perfil->update();
                }else{
                    return redirect()->back()->with('clavemenor', 'La clave debe ser mayor a 8 dígitos.');
                }
            }else{
                return redirect()->back()->with('claveIncorrecta', 'Las claves no coinciden.');            
            }
        }else{
            $Perfil -> name = $request->input('name');
            $Perfil -> username = $request->input('username');
            $Perfil -> email = $request->input('email');
            $Perfil->update();
        }
        return redirect()->back()->with('updateDatos', 'Los datos fueron cambiados correctamente.');
    }
}