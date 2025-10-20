<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::paginate(10);
        return view('asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        return view('asignaturas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:asignaturas,nombre',
            'descripcion' => 'nullable|string|max:500',
        ]);

        Asignatura::create($request->only('nombre', 'descripcion'));

        return redirect()->route('asignaturas.index')
                         ->with('success', 'Asignatura creada correctamente');
    }

    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit', compact('asignatura'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:asignaturas,nombre,' . $asignatura->id,
            'descripcion' => 'nullable|string|max:500',
        ]);

        $asignatura->update($request->only('nombre', 'descripcion'));

        return redirect()->route('asignaturas.index')
                         ->with('success', 'Asignatura actualizada correctamente');
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

        return redirect()->route('asignaturas.index')
                         ->with('success', 'Asignatura eliminada correctamente');
    }
}
