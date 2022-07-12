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
                    if(strlen($NewPass) >= 6){
                        $user->password = Hash::make($request->password);
                        $sqlBD = DB::table('users')
                                ->where('id', $user->id)
                                ->update(['password' => $user->password], ['name' => $user->name]);

                        return view('perfil.index');
                    }else{
                        return view('perfil.index');
                    }

                }else{
                    return view('perfil.index');                
                }

            }else{
                $name = $request->name;
                $sqlBDUpdateName = DB::table('users')
                                   ->where('id', $user->id)
                                   ->update(['name'->$name]);
                return view('perfil.index');            
            }
        }
    }
}
