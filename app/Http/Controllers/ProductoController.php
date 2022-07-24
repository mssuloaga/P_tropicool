<?php

namespace App\Http\Controllers;
use \PDF;
use App\Producto;
use App\Categoria;
use App\Models\Image;
use Twilio\Rest\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    public function downloadPdf()
    {
        $productos = Producto::all();
        view()->share('producto.exportpdf', $productos);
        $dompdf = PDF::loadView('producto.exportpdf', compact('productos'));
        return $dompdf->download('producto.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias=Categoria::all();
        return view('producto.create', compact('producto','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sid    = "AC2ee1ff3872ff34e27ec4f9e0bdca5046"; 
        $token  = "cdb7fa375edecd0bf4a8af95d97912e7"; 
        $twilio = new Client($sid, $token); 
 
        $message = $twilio->messages 
                  ->create("whatsapp:+56946120688", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Se a creado un nuevo producto : ".$request->nombre  
                           ) 
                  ); 

        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/productos/', $filename);
            

            $producto = new Producto;
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            $producto->cantidad = $request->input('cantidad');
            $producto->id_categorias = $request->input('id_categorias');
            $producto->imagen = $filename;

        $producto->save();
        }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'.'.$file->getClientOriginalName();
                $request['id_producto']=$producto->id;
                $request['image']=$imageName;
                $file->move('uploads/productos/',$imageName);
                Image::create($request->all());

            }
        }
        
        return redirect()->route('productos.index')
            ->with('success', 'Producto ingresado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias=Categoria::all();
        return view('producto.edit', compact('producto','categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
       
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->id_categorias = $request->input('id_categorias');

        if($request->hasfile('imagen'))
        {
            $destination = 'uploads/productos/'.$producto->imagen;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('imagen');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/productos/', $filename);
            $producto->imagen = $filename;
        }
        
        if($request->hasFile("images")){

        $images=Image::where("id_producto",$producto->id)->get();
        foreach($images as $image){
            $destinatione = 'uploads/productos/'.$image->image;
            if(File::exists($destinatione))
            {
                File::delete($destinatione);
            }
            }
        
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'.'.$file->getClientOriginalName();
                $request['id_producto']=$producto->id;
                $request['image']=$imageName;
                $file->move('uploads/productos/',$imageName);
                Image::create($request->all());

            }
        }

        $producto->update();
        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productos = Producto::findorFail($id);
        $destination = 'uploads/productos/'.$productos->imagen;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

        $images=Image::where("id_producto",$productos->id)->get();
        foreach($images as $image){
            $destinatione = 'uploads/productos/'.$image->image;
            if(File::exists($destinatione))
            {
                File::delete($destinatione);
            }
            }
        $productos->delete();
        
        return redirect()->route('productos.index')
            ->with('success', '');
    }





    public function ProductsImport(Request $request)
    {   
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            try {
                $import = Excel::import(new ProductsImport, $file);;
            } catch (\Throwable $th) {
                dd($th);
            }
            
            

           //($import->errors());
            return Response()->json(['response' => 'Excel cargado exitosamente!']);
        }
    }
}
