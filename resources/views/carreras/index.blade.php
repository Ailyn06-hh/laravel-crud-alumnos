@extends('layouts.app')

@section('title', 'Carreras Registradas')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8 border border-pink-100">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-pink-700">Carreras Registradas</h2>
        <a href="{{ route('carreras.create') }}"
           class="bg-pink-500 text-white px-5 py-2 rounded-lg shadow hover:bg-pink-600 transition">
            + Nueva Carrera
        </a>
    </div>

    <table class="table-auto w-full border-collapse rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-pink-100 text-pink-800">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($carreras as $carrera)
                <tr class="border-b hover:bg-pink-50 transition">
                    <td class="px-4 py-2">{{ $carrera->id }}</td>
                    <td class="px-4 py-2">{{ $carrera->nombre }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('carreras.edit', $carrera) }}"
                           class="bg-yellow-400 text-white px-4 py-1 rounded-md hover:bg-yellow-500 transition shadow">
                            Editar
                        </a>
                        <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                onclick="openModal('{{ route('carreras.destroy', $carrera) }}')"
                                class="bg-pink-400 text-white px-4 py-1 rounded-md hover:bg-pink-500 transition shadow">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 py-6">No hay carreras registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
