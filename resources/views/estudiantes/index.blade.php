@extends('layouts.app')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-8 border border-pink-100">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-pink-700">Lista de Estudiantes</h1>

        <a href="{{ route('estudiantes.create') }}"
           class="bg-pink-500 text-white px-5 py-2 rounded-lg shadow hover:bg-pink-600 transition">
            + Nuevo Estudiante
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full text-sm border border-pink-100 rounded-lg overflow-hidden">
        <thead class="bg-pink-100 text-pink-800">
            <tr>
                <th class="px-4 py-2 text-left font-semibold">ID</th>
                <th class="px-4 py-2 text-left font-semibold">Nombre</th>
                <th class="px-4 py-2 text-left font-semibold">Correo</th>
                <th class="px-4 py-2 text-left font-semibold">Carrera</th>
                <th class="px-4 py-2 text-left font-semibold">Semestre</th>
                <th class="px-4 py-2 text-center font-semibold">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estudiantes as $e)
            <tr class="border-b hover:bg-pink-50 transition">
                <td class="px-4 py-2">{{ $e->id }}</td>
                <td class="px-4 py-2">{{ $e->nombre }}</td>
                <td class="px-4 py-2">{{ $e->correo }}</td>
                <td class="px-4 py-2">{{ $e->carrera->nombre }}</td>
                <td class="px-4 py-2">{{ $e->semestre }}</td>
                <td class="px-4 py-2 text-center space-x-2">
                    <a href="{{ route('estudiantes.edit', $e) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded-md shadow hover:bg-yellow-500 transition">
                        Editar
                    </a>

                    <button type="button"
                            onclick="openModal('{{ route('estudiantes.destroy', $e) }}')"
                            class="bg-red-400 text-white px-3 py-1 rounded-md shadow hover:bg-red-500 transition">
                         Eliminar
                    </button>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
