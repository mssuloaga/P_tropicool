<?php

namespace App\Http\Controllers;
use PDF;
use App\Stock;
use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class StockController
 * @package App\Http\Controllers
 */
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Producto::paginate();

        return view('stock.index', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }
    public function downloadPdf()
    {
        $Stocks = Stock::all();
        view()->share('stock.exportpdf', $Stocks);
        $dompdf = PDF::loadView('stock.exportpdf', compact('Stocks'));
        return $dompdf->download('Stocks.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = new Producto();
        return view('stock.create', compact('stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Stock::$rules);

        $stock = Stock::create($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Producto::find($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Producto::find($id);
        $categorias=Categoria::all();
        return view('stock.edit', compact('stock','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $stock)
    {
        request()->validate(Producto::$rules);

        $stock->update($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stock = Stock::find($id)->delete();

        return redirect()->route('stocks.index')
            ->with('success', '');
    }
}
