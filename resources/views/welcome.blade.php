<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Test</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-50 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-10 rounded-2xl shadow-lg text-center">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Laravel + Tailwind 💙</h1>
        <p class="text-gray-600 mb-6">¡Tailwind está funcionando correctamente!</p>
        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
            Ir al CRUD de Estudiantes
        </a>
    </div>
</body>
</html>
