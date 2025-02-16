<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-md mt-10">
        <h2 class="text-2xl font-bold mb-4">Crear Usuario</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="id_rol" class="block text-sm font-medium text-gray-700">Rol:</label>
                <select name="id_rol" id="id_rol" required class="w-full p-2 border border-gray-300 rounded">
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>{{ $rol->nombre_rol }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="id_centro" class="block text-sm font-medium text-gray-700">Centro Médico:</label>
                <select name="id_centro" id="id_centro" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">N/A (Solo si el usuario es Administrador Global)</option>
                    @foreach($centros as $centro)
                        <option value="{{ $centro->id_centro }}" {{ old('id_centro') == $centro->id_centro ? 'selected' : '' }}>{{ $centro->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
