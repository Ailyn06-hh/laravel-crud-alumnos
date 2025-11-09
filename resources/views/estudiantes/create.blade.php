@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded-2xl shadow-lg border border-pink-100">
    <h2 class="text-2xl font-bold text-pink-700 mb-6 text-center">Registrar Estudiante</h2>

    <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre"
                   class="w-full border border-pink-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                   placeholder="Ej. María López" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Correo</label>
            <input type="email" name="correo"
                   class="w-full border border-pink-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                   placeholder="Ej. maria@gmail.com" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Carrera</label>
            <select name="carrera_id"
                    class="w-full border border-pink-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 bg-white" required>
                <option value="">Selecciona una carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Semestre</label>
            <input type="text" name="semestre"
                   class="w-full border border-pink-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                   placeholder="Ej. 3er semestre" required>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('estudiantes.index') }}"
               class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg shadow hover:bg-gray-400 transition">
               Cancelar
            </a>
            <button type="submit"
                    class="bg-pink-500 text-white px-5 py-2 rounded-lg shadow hover:bg-pink-600 transition">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
