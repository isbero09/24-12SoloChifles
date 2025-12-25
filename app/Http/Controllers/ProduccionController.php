<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Administracion.produccion.index', [
            "produccions" => Produccion::with('producto')->paginate(),
            "productos" => Producto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Normalizar los nombres de campos de PascalCase a snake_case
        $data = [
            'fecha' => $request->input('Fecha'),
            'cantidad_fundas' => $request->input('CantidadFundas'),
            'producto_id' => $request->input('Producto'),
        ];

        Produccion::create($data);
        return redirect()->route("produccion.index")->with("success", "registro creado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Normalizar los nombres de campos de PascalCase a snake_case
        $data = [
            'fecha' => $request->input('Fecha'),
            'cantidad_fundas' => $request->input('CantidadFundas'),
            'producto_id' => $request->input('Producto'),
        ];

        $updateit = Produccion::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("produccion.index")->with("success", "registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produccion::destroy($id);
        return redirect()->route("produccion.index")->with("success", "registro borrado exitosamente");
    }
}
