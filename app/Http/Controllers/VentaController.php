<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Administracion.venta.index', [
            'ventas' => Venta::with('usuario')->paginate(),
            'usuarios' => Usuario::all()
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
            'precio' => $request->input('Precio'),
            'pagado' => filter_var($request->input('Pagado'), FILTER_VALIDATE_BOOLEAN),
            'fecha_venta' => $request->input('Fechaventa'),
            'fecha_pago' => $request->input('FechaPago'),
            'cedula' => $request->input('Cedula'),
        ];

        Venta::create($data);
        return redirect()->route("venta.index")->with("success","registro creado exitosamente");
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
            'precio' => $request->input('Precio'),
            'pagado' => filter_var($request->input('Pagado'), FILTER_VALIDATE_BOOLEAN),
            'fecha_venta' => $request->input('Fechaventa'),
            'fecha_pago' => $request->input('FechaPago'),
            'cedula' => $request->input('Cedula'),
        ];

        $updateit = Venta::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("venta.index")->with("success","registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Venta::destroy($id);
        return redirect()->route("venta.index")->with("success","registro borrado exitosamente");
    }
}
