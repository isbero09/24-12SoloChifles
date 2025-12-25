<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Usuarios.proveedor.index', 
        ['proveedores' => Proveedor::paginate()]);
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
            'nombre' => $request->input('Nombre'),
            'telefono' => $request->input('Telefono'),
            'direccion' => $request->input('Direccion'),
        ];

        Proveedor::create($data);
        return redirect()->route("proveedores.index")->with("success","registro creado exitosamente");
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
            'nombre' => $request->input('Nombre'),
            'telefono' => $request->input('Telefono'),
            'direccion' => $request->input('Direccion'),
        ];

        $updateit = Proveedor::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("proveedores.index")->with("success","registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Proveedor::destroy($id);
        return redirect()->route("proveedores.index")->with("success","registro borrado exitosamente");
    }
}