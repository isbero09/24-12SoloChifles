<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::with('proveedor')->paginate();
        $proveedores = Proveedor::all();
        // Obtener compras a crédito pendientes
        $comprasCredito = Compra::with('proveedor')
            ->where('tipo_de_pago', 'credito')
            ->get();
        return view('Administracion.compra.index', [
            "compras" => $compras,
            "proveedores" => $proveedores,
            "comprasCredito" => $comprasCredito
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
            'insumo' => $request->input('Insumo'),
            'proveedor_id' => $request->input('Proveedor'),
            'cantidad' => $request->input('Cantidad'),
            'unidad' => $request->input('Unidad'),
            'costo_unitario' => $request->input('CostoUnitario'),
            'tipo_de_pago' => $request->input('TipoDePago'),
            'dias_de_credito' => $request->input('DiasDeCredito'),
        ];

        Compra::create($data);
        return redirect()->route("compras.index")->with("success", "registro creado exitosamente");
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
            'insumo' => $request->input('Insumo'),
            'proveedor_id' => $request->input('Proveedor'),
            'cantidad' => $request->input('Cantidad'),
            'unidad' => $request->input('Unidad'),
            'costo_unitario' => $request->input('CostoUnitario'),
            'tipo_de_pago' => $request->input('TipoDePago'),
            'dias_de_credito' => $request->input('DiasDeCredito'),
        ];

        $updateit = Compra::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("compras.index")->with("success", "registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Compra::destroy($id);
        return redirect()->route("compras.index")->with("success", "registro borrado exitosamente");
    }
}
