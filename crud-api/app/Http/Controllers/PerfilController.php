<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Perfil::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:perfiles,correo',
            'telefono' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        return Perfil::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfile)
    {
        return $perfile;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfil $perfile)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:perfiles,correo,' . $perfile->id,
            'telefono' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        $perfile->update($data);
        return $perfile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfile)
    {
        $perfile->delete();
        return response()->noContent();
    }
}
