<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PerfilController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('perfil_index'), 403);

        $posts = Post::paginate(5);
        return view('perfil.index', compact('perfil'));
    }
}
