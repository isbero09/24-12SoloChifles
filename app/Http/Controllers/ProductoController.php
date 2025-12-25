<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View ('Administracion.producto.index', 
        ["productos"=>Producto::paginate()]);
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
            'nombre_producto' => $request->input('NombreProducto'),
            'PVP1' => $request->input('PVP1'),
            'PVP2' => $request->input('PVP2'),
            'PVP3' => $request->input('PVP3'),
        ];

        Producto::create($data);
        return redirect()->route("productos.index")->with("success","registro creado exitosamente");
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
            'nombre_producto' => $request->input('NombreProducto'),
            'PVP1' => $request->input('PVP1'),
            'PVP2' => $request->input('PVP2'),
            'PVP3' => $request->input('PVP3'),
        ];

        $updateit = Producto::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("productos.index")->with("success","registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Producto::destroy($id);
        return redirect()->route("productos.index")->with("success","registro borrado exitosamente");

    }
}
