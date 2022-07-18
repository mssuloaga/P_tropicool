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
                                ->update(['password' => $user->password], ['name' => $name]);
                        
                        $name = $request->name;
                        $sqlBDUpdateName = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['name' => $name]);

                        return redirect()->back()->with('updateDatos', 'Los datos fueron cambiados correctamente.');
                    }else{
                        return redirect()->back()->with('clavemenor', 'La clave debe ser mayor a 8 dígitos.');
                    }

                }else{
                    return redirect()->back()->with('claveIncorrecta', 'Por favor verifique las claves no coinciden.');            
                }
            }else{
                return redirect()->back()->with('NoCoinciden', 'Las claves no coinciden.');     
            }

        }else{
            $name = $request->name;
            $sqlBDUpdateName = DB::table('users')
                                ->where('id', $user->id)
                                ->update(['name' => $name]);
            return redirect()->back()->with('name', 'El nombre fue cambiado correctamente.');
        }

    }
}
