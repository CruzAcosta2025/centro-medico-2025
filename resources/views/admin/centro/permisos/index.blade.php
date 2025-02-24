@extends($layout)

@section('title', 'Gestión de Permisos')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Gestión de Permisos</h2>
        <a href="{{ route('permisos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
            + Crear Nuevo Permiso
        </a>
    </div>

    <!-- Tabla de Permisos -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-600 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left border border-blue-700">Nombre del Módulo</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Tipo de Permiso</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Centro Médico</th>
                    <th class="px-6 py-3 text-center border border-blue-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permisos as $permiso)
                <tr class="border border-blue-500 hover:bg-blue-200 transition">
                    <td class="px-6 py-4 border border-blue-500">{{ $permiso->nombre_modulo }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $permiso->tipo_permiso }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $permiso->centroMedico->nombre }}</td>
                    <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                        <a href="{{ route('permisos.edit', $permiso->id_permiso) }}"
                            class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-800 transition">
                            Editar
                        </a>
                        <form action="{{ route('permisos.destroy', $permiso->id_permiso) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar este permiso?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
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
