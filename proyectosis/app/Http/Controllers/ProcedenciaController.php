<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProcedenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $procedencias = Procedencia::paginate();

        return view('procedencia.index', compact('procedencias'))
            ->with('i', ($request->input('page', 1) - 1) * $procedencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $procedencia = new Procedencia();

        return view('procedencia.create', compact('procedencia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcedenciaRequest $request): RedirectResponse
    {
        
        $requestData = $request->all(); 
         if ($request->hasFile('bandera')){ 
        //Guarda la foto subida, en una carpeta 
        $nomArch = $request->file('bandera')->store('imagesb', 'public'); 
        $requestData['bandera']=$nomArch; 
        } 
        
        Procedencia::create($requestData); 
        return Redirect::route('procedencias.index')
            ->with('success', 'Procedencia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $procedencia = Procedencia::find($id);

        return view('procedencia.show', compact('procedencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $procedencia = Procedencia::find($id);

        return view('procedencia.edit', compact('procedencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProcedenciaRequest $request, Procedencia $procedencia): RedirectResponse
    {
        $procedencia->update($request->validated());

        return Redirect::route('procedencias.index')
            ->with('success', 'Procedencia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Procedencia::find($id)->delete();

        return Redirect::route('procedencias.index')
            ->with('success', 'Procedencia deleted successfully');
    }
}
