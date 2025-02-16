<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Centro Médico</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-md mt-10">
        <h2 class="text-2xl font-bold mb-4">Editar Centro Médico</h2>
        <form action="{{ route('centros.update', $centro->id_centro) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $centro->nombre }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="{{ $centro->direccion }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="ruc" class="block text-sm font-medium text-gray-700">RUC:</label>
                <input type="text" name="ruc" id="ruc" value="{{ $centro->ruc }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="color_tema" class="block text-sm font-medium text-gray-700">Color del Tema:</label>
                <input type="color" name="color_tema" id="color_tema" value="{{ $centro->color_tema }}" required class="w-16 h-8">
            </div>
            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado:</label>
                <select name="estado" id="estado" class="w-full p-2 border border-gray-300 rounded">
                    <option value="ACTIVO" {{ $centro->estado == 'ACTIVO' ? 'selected' : '' }}>Activo</option>
                    <option value="INACTIVO" {{ $centro->estado == 'INACTIVO' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                    Actualizar
                </button>
                <a href="{{ route('centros.index') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
