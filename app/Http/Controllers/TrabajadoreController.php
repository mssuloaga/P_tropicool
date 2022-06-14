<?php

namespace App\Http\Controllers;

use App\Trabajadore;
use Illuminate\Http\Request;

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
        return view('trabajadore.create', compact('trabajadore'));
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
            ->with('success', 'Trabajadore created successfully.');
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

        return view('trabajadore.edit', compact('trabajadore'));
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
            ->with('success', 'Trabajadore updated successfully');
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
            ->with('success', 'Trabajadore deleted successfully');
    }
}
