<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('Usuarios.permiso.index', 
        ["permisos"=>Permiso::paginate()]);
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
            'fecha_asignacion' => $request->input('FechaAsignacion'),
            'cedula' => $request->input('Cedula'),
        ];

        Permiso::create($data);
        return redirect()->route("permisos.index")->with("success","registro creado exitosamente");
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
            'fecha_asignacion' => $request->input('FechaAsignacion'),
            'cedula' => $request->input('Cedula'),
        ];

        $updateit = Permiso::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("permisos.index")->with("success","registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permiso::destroy($id);
        return redirect()->route("permisos.index")->with("success","registro borrado exitosamente");
    }
}
