<?php

namespace App\Http\Controllers;

use App\Models\Ventasproducto;
use App\Models\Usuario;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentasproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventasproductos = Ventasproducto::with(['usuario', 'producto'])->paginate();
        $usuarios = Usuario::all();
        $productos = Producto::all();
        return view('Administracion.ventaproducto.index', compact('ventasproductos', 'usuarios', 'productos'));
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
        // Normalizar los nombres de campos
        $data = [
            'cliente_cedula' => $request->input('cliente') ?? $request->input('cliente_cedula'),
            'producto_id' => $request->input('producto') ?? $request->input('producto_id'),
            'detalle' => $request->input('detalle'),
            'precio' => $request->input('precio'),
            'fecha' => $request->input('fecha'),
        ];

        Ventasproducto::create($data);
        return redirect()->route("ventaproducto.index")->with("success", "registro creado exitosamente");
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
        // Normalizar los nombres de campos
        $data = [
            'cliente_cedula' => $request->input('cliente') ?? $request->input('cliente_cedula'),
            'producto_id' => $request->input('producto') ?? $request->input('producto_id'),
            'detalle' => $request->input('detalle'),
            'precio' => $request->input('precio'),
            'fecha' => $request->input('fecha'),
        ];

        $updateit = Ventasproducto::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("ventaproducto.index")->with("success", "registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ventasproducto::destroy($id);
        return redirect()->route("ventaproducto.index")->with("success", "registro borrado exitosamente");
    }
}
