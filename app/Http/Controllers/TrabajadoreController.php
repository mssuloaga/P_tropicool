<?php

namespace App\Http\Controllers;
use PDF;
use App\Trabajadore;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function downloadPdf()
    {
        $trabajadores = Trabajadore::all();
        view()->share('trabajadore.exportpdf', $trabajadores);
        $dompdf = PDF::loadView('trabajadore.exportpdf', compact('trabajadores'));
        return $dompdf->download('trabajadores.pdf');
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
        $trabajadore = new Trabajadore;
        $trabajadore->rut_trabajador = $request->input('rut_trabajador');
        $trabajadore->nombre = $request->input('nombre');
        $trabajadore->direccion = $request->input('direccion');
        $trabajadore->telefono = $request->input('telefono');
        $trabajadore->email = $request->input('email');
        $trabajadore->fecha_ingreso = $request->input('fecha_ingreso');
        $trabajadore->sueldo = $request->input('sueldo');
        $trabajadore->cargo = $request->input('cargo');
        $trabajadore->id_empresas = $request->input('id_empresas');

        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/trabajadores/', $filename);
            $trabajadore->imagen = $filename;
        }

        if($request->hasfile('curriculum'))
        {
            $file = $request->file('curriculum');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/trabajadores/', $filename);
            $trabajadore->curriculum = $filename;
        }

        $trabajadore->save();
        return redirect()->route('trabajadores.index')
            ->with('success', 'Trabajador ingresado con éxito');
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
       
        $trabajadore->rut_trabajador = $request->input('rut_trabajador');
        $trabajadore->nombre = $request->input('nombre');
        $trabajadore->direccion = $request->input('direccion');
        $trabajadore->telefono = $request->input('telefono');
        $trabajadore->email = $request->input('email');
        $trabajadore->fecha_ingreso = $request->input('fecha_ingreso');
        $trabajadore->sueldo = $request->input('sueldo');
        $trabajadore->cargo = $request->input('cargo');
        $trabajadore->id_empresas = $request->input('id_empresas');

        if($request->hasfile('imagen'))
        {
            $destination = 'uploads/trabajadores/'.$trabajadore->imagen;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('imagen');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/trabajadores/', $filename);
            $trabajadore->imagen = $filename;
        }

        if($request->hasfile('curriculum'))
        {
            $destination = 'uploads/trabajadores/'.$trabajadore->curriculum;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('curriculum');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/trabajadores/', $filename);
            $trabajadore->curriculum = $filename;
        }

        $trabajadore->update();
        return redirect()->route('trabajadores.index')
            ->with('success', 'trabajador actualizado con éxito');
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
        ->with('eliminar', 'ok');
    }

    public function obtenercurriculum($id){
        
        $curriculum=trabajadore::where('id',$id)->first();

        
    }
}
