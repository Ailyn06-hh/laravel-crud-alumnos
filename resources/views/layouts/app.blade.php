<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
    @vite('resources/css/app.css')
    <script>
        // Mensajes automáticos de éxito
        document.addEventListener('DOMContentLoaded', () => {
            const alert = document.querySelector('#alerta');
            if (alert) {
                setTimeout(() => alert.classList.add('opacity-0', 'translate-y-2'), 3000);
                setTimeout(() => alert.remove(), 3500);
            }
        });
    </script>
</head>
<body class="bg-pink-50 text-gray-800 font-sans min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-pink-300 text-gray-800 shadow-md p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="/" class="font-extrabold text-lg text-pink-900 tracking-wide">CRUD Alumnos</a>
            <div class="space-x-4 font-medium">
                <a href="{{ route('carreras.index') }}" class="hover:text-pink-900 transition">Carreras</a>
                <a href="{{ route('estudiantes.index') }}" class="hover:text-pink-900 transition">Estudiantes</a>
            </div>
        </div>
    </nav>
    @if(session('success'))
        <div id="alerta" class="transition duration-500 ease-in-out bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-md max-w-md mx-auto mt-4 text-center shadow">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div id="alerta" class="transition duration-500 ease-in-out bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded-md max-w-md mx-auto mt-4 text-center shadow">
            {{ session('error') }}
        </div>
    @endif
    <main class="flex-grow p-6 max-w-6xl mx-auto">
        @yield('content')
    </main>
    <footer class="bg-pink-200 text-pink-800 py-3 shadow-inner">
        <div class="max-w-6xl mx-auto text-center text-sm">
             Autor: <strong>Ailyn Hernández Hermosillo</strong> — CRUD de Estudiantes y Carreras con Laravel 12
        </div>
    </footer>
    <div id="confirmModal" class="hidden fixed inset-0 bg-gray-900/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-80">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">¿Seguro que deseas eliminar este registro?</h3>
            <div class="flex justify-center gap-4">
                <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">Cancelar</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(actionUrl) {
            document.getElementById('deleteForm').setAttribute('action', actionUrl);
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }
    </script>

</body>
</html>
