<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use App\Trabajadore;
use App\Empresa;
use Illuminate\Support\Facades\Storage;

/**
 * Class EventoController
 * @package App\Http\Controllers
 */
class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::paginate();

        return view('evento.index', compact('eventos'))
            ->with('i', (request()->input('page', 1) - 1) * $eventos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evento = new Evento();
        $trabajadores=Trabajadore::all();
        return view('evento.create', compact('evento','trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evento::$rules);

        $evento = Evento::create($request->all());

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);

        return view('evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        $trabajadores=Trabajadore::all();
        return view('evento.edit', compact('evento','trabajadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);

        $evento->update($request->all());

        return redirect()->route('eventos.index')
            ->with('success', 'Evento actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $evento = Evento::find($id)->delete();

        return redirect()->route('eventos.index')
            ->with('success', '');
    }
}
