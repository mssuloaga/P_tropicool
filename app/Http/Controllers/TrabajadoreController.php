<?php

namespace App\Http\Controllers;

use App\Trabajadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Empresa;

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
        $trabajadore = Trabajadore::paginate();

        return view('trabajadores.index', compact('trabajadore'))
            ->with('i', (request()->input('page', 1) - 1) * $trabajadore->perPage());
    }


    public function pdf()
    {
        $trabajadore=Trabajadore::paginate();
        $pdf = PDF::loadView('trabajadores.pdf', ['trabajadore'=>$trabajadore])
            ->setPaper('a4', 'landscape')->setWarnings(false)->save('trabajadores.pdf')
                ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);   
   
       // return $pdf->stream();
      return $pdf->download('__trabajadores.pdf');
       // return view('trabajadores.pdf', compact('trabajador'));    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajadore = new Trabajadore();
        $empresa=Empresa::pluck('nombre','id');
        return view('trabajadores.create', compact('trabajadore','empresa'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[            
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'rut_usuario'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:12',
            'email'=>'required|string|max:100',
            'fecha_ingreso'=>'required|date',
            
            'sueldo'=>'required|integer',
            'cargo'=>'required|string|max:100',     
            'id_empresas'=>'required|integer',       
        ];
        $mensaje=[
            'required'=>'El :atibuto es requerido',
            'imagen.required'=>'La imagen de requerida'

        ];
        $this->validate($request, $campos, $mensaje);
        //$datoTrabajador = request()->all();
        $datoTrabajador = request()->except('_token');  //Recolectas todos los campos, menos el token
        if($request->hasFile('imagen')){
            $datoTrabajador['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Trabajadore::insert($datoTrabajador); //Inserta los datos a la bbdd
        //return response()->json($datoTrabajador);
        return redirect('trabajadores')->with('mensaje','Trabajador agregado con exito');
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

        return view('trabajadores.show', compact('trabajadore'));
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

        $empresa=Empresa::pluck('nombre','id');
        return view('trabajadores.edit', compact('trabajadore','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Trabajadore $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[            
            'rut_usuario'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:12',
            'email'=>'required|string|max:100',
            'fecha_ingreso'=>'required|date',
            
            'sueldo'=>'required|integer',
            'cargo'=>'required|string|max:100', 
            'id_empresas'=>'required|integer',

        ];
        $mensaje=[
            'required'=>'El :atibuto es requerido'
            
        ];
        //No es necesario adjuntar una nueva foto           
        if($request->hasFile('imagen')){
            $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=[ 'imagen.required'=>'La imagen de requerida'];
           }

        $this->validate($request, $campos, $mensaje);

        $datoTrabajador = request()->except(['_token','_method']);        

        if($request->hasFile('imagen')){           
            $trabajadore=Trabajadore::findOrFail($id);
            Storage::delete('public/'.$trabajadore->imagen);
            $datoTrabajador['imagen']=$request->file('imagen')->store('uploads','public');
        } 

        
        Trabajadore::where('id','=',$id)->update($datoTrabajador);
        $trabajadore=Trabajadore::findOrFail($id); 
        //return view('trabajador.edit', compact('trabajador'))->with('mensaje','Trabajador modificado');
        return redirect('trabajadores')->with('mensaje','Trabajador modificado');
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
