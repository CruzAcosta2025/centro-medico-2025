@extends($layout)

@section('title', 'Gestión de Personal Médico')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Gestión de Personal Médico</h2>
        <a href="{{ route('usuarios-centro.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            + Crear Nuevo Usuario
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Tabla de Personal Médico -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-600 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left border border-blue-700">Nombre</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Especialidad</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Correo</th>
                    <th class="px-6 py-3 text-left border border-blue-700">DNI</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Teléfono</th>
                    <th class="px-6 py-3 text-center border border-blue-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($personalMedico as $personal)
                    <tr class="border border-blue-500 hover:bg-blue-200 transition">
                        <td class="px-6 py-4 border border-blue-500">{{ $personal->usuario->nombre ?? 'Sin asignar' }}</td>
                        <td class="px-6 py-4 border border-blue-500">{{ $personal->especialidad->nombre_especialidad ?? 'N/A' }}</td>
                        <td class="px-6 py-4 border border-blue-500">{{ $personal->correo_contacto }}</td>
                        <td class="px-6 py-4 border border-blue-500">{{ $personal->dni }}</td>
                        <td class="px-6 py-4 border border-blue-500">{{ $personal->telefono }}</td>
                        <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                            <a href="{{ route('personal-medico.edit', $personal->id_personal_medico) }}" class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-800 transition">
                                Editar
                            </a>
                            <form action="{{ route('personal-medico.destroy', $personal->id_personal_medico) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este personal médico?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition" disabled>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-600">No hay personal médico registrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
