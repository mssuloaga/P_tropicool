<?php

namespace App\Http\Controllers;
use \PDF;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class EmpresaController
 * @package App\Http\Controllers
 */
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();

        return view('empresa.index', compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * $empresas->perPage());
    }

    public function downloadPdf()
    {
        $empresas = Empresa::all();
        view()->share('empresa.exportpdf', $empresas);
        $dompdf = PDF::loadView('empresa.exportpdf', compact('empresas'));
        return $dompdf->download('empresa.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        return view('empresa.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->telefono = $request->input('telefono');
        $empresa->mision = $request->input('mision');
        $empresa->vision = $request->input('vision');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->instagram = $request->input('instagram');
        $empresa->facebook = $request->input('facebook');


        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/empresa/', $filename);
            $empresa->logo = $filename;
        }
        $empresa->save();
        return redirect()->route('empresas.index')
            ->with('success', 'Empresa ingresada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
       
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->telefono = $request->input('telefono');
        $empresa->mision = $request->input('mision');
        $empresa->vision = $request->input('vision');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->instagram = $request->input('instagram');
        $empresa->facebook = $request->input('facebook');

        if($request->hasfile('logo'))
        {
            $destination = 'uploads/empresa/'.$empresa->logo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/empresa/', $filename);
            $empresa->logo = $filename;
        }

        $empresa->update();
        return redirect()->route('empresas.index')
            ->with('success', 'Empresa actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id)->delete();

        return redirect()->route('empresas.index')
            ->with('success', '');
    }
}
