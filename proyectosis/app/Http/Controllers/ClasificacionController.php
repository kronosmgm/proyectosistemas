<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClasificacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $clasificacions = Clasificacion::paginate();

        return view('clasificacion.index', compact('clasificacions'))
            ->with('i', ($request->input('page', 1) - 1) * $clasificacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clasificacion = new Clasificacion();

        return view('clasificacion.create', compact('clasificacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasificacionRequest $request): RedirectResponse
    {
        Clasificacion::create($request->validated());

        return Redirect::route('clasificacions.index')
            ->with('success', 'Clasificacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $clasificacion = Clasificacion::find($id);

        return view('clasificacion.show', compact('clasificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $clasificacion = Clasificacion::find($id);

        return view('clasificacion.edit', compact('clasificacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClasificacionRequest $request, Clasificacion $clasificacion): RedirectResponse
    {
        $clasificacion->update($request->validated());

        return Redirect::route('clasificacions.index')
            ->with('success', 'Clasificacion updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Clasificacion::find($id)->delete();

        return Redirect::route('clasificacions.index')
            ->with('success', 'Clasificacion deleted successfully');
    }
}
