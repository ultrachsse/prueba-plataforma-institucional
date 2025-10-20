<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\User;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::with(['user','asignatura'])->get();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        $asignaturas = Asignatura::all();
        return view('docentes.create', compact('asignaturas'));
    }

   public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'rut' => 'required|string|max:20|unique:docentes,rut',
            'telefono' => 'nullable|string|max:20',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'password' => 'required|string|min:6',
        ]);

        // 1. Crear el usuario
        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 2. Crear el docente enlazado al usuario
        Docente::create([
            'user_id' => $user->id,
            'rut' => $request->rut,
            'telefono' => $request->telefono,
            'asignatura_id' => $request->asignatura_id,
        ]);

   return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente');
    }

public function edit(Docente $docente)
{
    // Cargar asignaturas para el select
    $asignaturas = Asignatura::all();

    return view('docentes.edit', compact('docente', 'asignaturas'));
}

public function update(Request $request, Docente $docente)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $docente->user_id,
        'rut' => 'required|string|max:20|unique:docentes,rut,' . $docente->id,
        'telefono' => 'nullable|string|max:20',
        'asignatura_id' => 'required|exists:asignaturas,id',
        'password' => 'nullable|string|min:6',
    ]);

    // 1. Actualizar el usuario
    $docente->user->update([
        'name' => $request->nombre,
        'email' => $request->email,
        'password' => $request->filled('password')
            ? bcrypt($request->password)
            : $docente->user->password,
    ]);

    // 2. Actualizar el docente
    $docente->update([
        'rut' => $request->rut,
        'telefono' => $request->telefono,
        'asignatura_id' => $request->asignatura_id,
    ]);

    return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente');
}

public function show(Docente $docente)
{
    // Cargar relaciones para mostrar datos completos
    $docente->load(['user', 'asignatura']);

    return view('docentes.show', compact('docente'));
}


public function destroy(Docente $docente)
{
    $docente->user->delete(); // esto borra el user y automáticamente el docente
    return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente');
}



}
