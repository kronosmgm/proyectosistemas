<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Procedencia;
use App\Models\Marca;
use App\Models\Clasificacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();
        $var = Procedencia::All();
        $marc = Marca::All();
        $clas = Clasificacion::All();

        return view('producto.create', compact('producto','var','marc','clas'));
    }

    public function pdf(){

        
        $productos=Producto::all();
        $pdf = Pdf::loadView('producto.pdf', compact('productos'))
        ->setPaper('a4', 'landscape');
        
        return $pdf->stream();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request): RedirectResponse
    {
        $requestData = $request->all(); 
         if ($request->hasFile('foto')){ 
        //Guarda la foto subida, en una carpeta 
        $nomArch = $request->file('foto')->store('images', 'public'); 
        $requestData['foto']=$nomArch; 
        } 
        
        Producto::create($requestData); 

        return Redirect::route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
       
        $producto = Producto::with('marca', 'clasificacion', 'procedencia')->findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        $producto->update($request->validated());

        return Redirect::route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Producto::find($id)->delete();

        return Redirect::route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
