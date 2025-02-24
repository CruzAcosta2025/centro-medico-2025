@extends($layout)

@section('title', 'Gestión de Especialidades')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Gestión de Especialidades</h2>
        <a href="{{ route('especialidad.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            + Agregar Nueva Especialidad
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Tabla de Especialidades -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-600 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left border border-blue-700">Nombre de la Especialidad</th>
                    <th class="px-6 py-3 text-center border border-blue-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($especialidades as $especialidad)
                    <tr class="border border-blue-500 hover:bg-blue-200 transition">
                        <td class="px-6 py-4 border border-blue-500">{{ $especialidad->nombre_especialidad }}</td>
                        <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                            <a href="{{ route('especialidad.edit', $especialidad->id_especialidad) }}" class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-800 transition">
                                Editar
                            </a>
                            <form action="{{ route('especialidad.destroy', $especialidad->id_especialidad) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta especialidad?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4 text-gray-600">No hay especialidades registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
