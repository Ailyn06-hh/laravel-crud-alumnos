<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes',
            'carrera_id' => 'required|exists:carreras,id',
            'semestre' => 'required|string|max:20',
        ]);

        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado exitosamente.');
    }

    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes,correo,' . $estudiante->id,
            'carrera_id' => 'required|exists:carreras,id',
            'semestre' => 'required|string|max:20',
        ]);

        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
