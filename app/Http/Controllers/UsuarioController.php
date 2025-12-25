<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('Usuarios.usuario.index', 
        ["usuarios"=>Usuario::paginate()]);
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
            'cedula' => $request->input('Cedula'),
            'nombre' => $request->input('Nombre'),
            'direccion' => $request->input('Direccion'),
            'telefono' => $request->input('Telefono'),
            'referencia' => $request->input('Referencia'),
        ];

        Usuario::create($data);
        return redirect()->route("usuarios.index")->with("success","registro creado exitosamente");
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
            'cedula' => $request->input('Cedula'),
            'nombre' => $request->input('Nombre'),
            'direccion' => $request->input('Direccion'),
            'telefono' => $request->input('Telefono'),
            'referencia' => $request->input('Referencia'),
        ];

        $updateit = Usuario::findOrFail($id);
        $updateit->update($data);
        return redirect()->route("usuarios.index")->with("success","registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::destroy($id);
        return redirect()->route("usuarios.index")->with("success","registro borrado exitosamente");
    }
}
