<?php

namespace App\Http\Controllers;

use App\Trabajadore;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class TrabajadoreController
 * @package App\Http\Controllers
 */
class TrabajadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajadore::paginate();

        return view('trabajadore.index', compact('trabajadores'))
            ->with('i', (request()->input('page', 1) - 1) * $trabajadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajadore = new Trabajadore();
        $empresas= Empresa::all();
        return view('trabajadore.create', compact('trabajadore','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Trabajadore::$rules);

        $trabajadore = Trabajadore::create($request->all());

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajadore = Trabajadore::find($id);

        return view('trabajadore.show', compact('trabajadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajadore = Trabajadore::find($id);
        $empresas= Empresa::all();
        return view('trabajadore.edit', compact('trabajadore','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Trabajadore $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajadore $trabajadore)
    {
        request()->validate(Trabajadore::$rules);

        $trabajadore->update($request->all());

        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $trabajadore = Trabajadore::find($id)->delete();

        return redirect()->route('trabajadores.index')
            ->with('success', '');
    }
}
