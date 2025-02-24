@extends($layout)

@section('title', 'Gestión de Pacientes')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Listado de Pacientes</h2>
        <a href="{{ route('pacientes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            + Agregar Paciente
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- Tabla de Pacientes -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-600 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left border border-blue-700">Nombre Completo</th>
                    <th class="px-6 py-3 text-left border border-blue-700">DNI</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Fecha de Nacimiento</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Teléfono</th>
                    <th class="px-6 py-3 text-left border border-blue-700">Grupo Sanguíneo</th>
                    <th class="px-6 py-3 text-center border border-blue-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pacientes as $paciente)
                <tr class="border border-blue-500 hover:bg-blue-200 transition">
                    <td class="px-6 py-4 border border-blue-500">
                        {{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }}
                        {{ $paciente->primer_apellido }} {{ $paciente->segundo_apellido }}
                    </td>
                    <td class="px-6 py-4 border border-blue-500">{{ $paciente->dni }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $paciente->fecha_nacimiento }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $paciente->telefono }}</td>
                    <td class="px-6 py-4 border border-blue-500">{{ $paciente->grupo_sanguineo }}</td>
                    <td class="px-6 py-4 flex flex-wrap justify-center gap-2">
                        <a href="{{ route('pacientes.edit', $paciente->id_paciente) }}" class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-800 transition">
                            Editar
                        </a>
                        <form action="{{ route('pacientes.destroy', $paciente->id_paciente) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este paciente?')">
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
                    <td colspan="6" class="text-center py-4 text-gray-600">No hay pacientes registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection