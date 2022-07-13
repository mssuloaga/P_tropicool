<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class PerfilController extends Controller
{
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
        
        $user = Auth::user();
        $userId = $user->id;
        $userName = $user->name;
        $userUsername = $user->username;
        $userEmail = $user->email;
        $userPassword = $user->password;

        if($request->password_actual !=""){
            $NewPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;

            if (Hash::check($request->password_actual, $userPassword)){
                if($NewPass == $confirPass){
                    if(strlen($NewPass) >= 8){
                        $user->password = Hash::make($request->password);
                        $sqlBD = DB::table('users')
                                ->where('id', $user->id)
                                ->update(['password' => $user->password], ['name' => $user->name]);

                        return view('perfil.index');
                        // return redirect()->back()->with('updateClave', 'La clave cambiada correctamente.');
                    }else{
                        return view('perfil.index');
                        // return redirect()->back()->with('clavemenor', 'La clave debe ser mayor a 8 dígitos.');
                    }

                }else{
                    return view('perfil.index');    
                    // return redirect()->back()->with('claveIncorrecta', 'Por favor verifique las claves no coinciden.');            
                }
            }else{
                return view('perfil.index');    
            }

        }else{
            $name = $request->name;
            $username = $request->username;
            $email = $request->email;
            $sqlBDUpdateName = DB::table('users')
                                ->where('id', $user->id)
                                ->update(['name' => $name], ['username' => $username], ['email' => $email]);
            // return view('perfil.index'); 
            return redirect()->back()->with('name', 'El nombre fue cambiado correctamente.');           
        }

    }
}
