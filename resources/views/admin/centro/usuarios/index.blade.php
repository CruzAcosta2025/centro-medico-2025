@extends($layout)

@section('title', 'Gestión de Usuarios del Centro')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Gestión de Usuarios del Centro</h2>
        <a href="{{ route('usuarios-centro.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
            + Crear Nuevo Usuario
        </a>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-600 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left border border-blue-700">Nombre</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Correo Electrónico</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Rol</th>
                    <th class="px-6 py-3 text-center border border-blue-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="border border-blue-500 hover:bg-blue-200 transition">
                    <td class="px-6 py-4 border border-blue-500">{{ $usuario->nombre }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $usuario->email }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $usuario->rol->nombre_rol }}</td>
                    <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                        <a href="{{ route('usuarios-centro.edit', $usuario->id_usuario) }}"
                            class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-800 transition">
                            Editar
                        </a>
                        <form action="{{ route('usuarios-centro.destroy', $usuario->id_usuario) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition" disabled>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
