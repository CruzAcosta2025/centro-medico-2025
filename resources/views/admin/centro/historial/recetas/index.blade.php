@extends($layout)

@section('title', 'Listado de Recetas')

@section('content')
<div class="max-w-4xl mx-auto p-5 w-11/12">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-rose-500 to-red-600 p-5">
            <h2 class="text-white text-lg sm:text-xl font-semibold m-0">Listado de Recetas</h2>
        </div>

        <div class="p-5">
            <form method="GET" action="{{ route('recetas.index') }}" class="mb-5 flex flex-wrap gap-2">
                <input type="text" name="dni" value="{{ $dni }}" placeholder="Buscar por DNI"
                    class="flex-1 min-w-[200px] p-2 border border-gray-300 rounded-md">
                <button type="submit"
                    class="px-4 py-2 bg-rose-500 text-white rounded-md hover:bg-rose-600 transition">Buscar</button>
            </form>

            @if ($paciente)
            <h3 class="mb-5 font-semibold">Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</h3>

            @if ($paciente->historialClinico->isNotEmpty())
            <a href="{{ route('recetas.create', $paciente->historialClinico->first()->id_historial) }}"
                class="inline-block px-4 py-2 bg-red-600 text-white rounded-md mb-5 hover:bg-red-700 transition">
                Nueva Receta
            </a>
            @else
            <p class="text-red-500">El paciente no tiene un historial clínico.</p>
            @endif

            @if ($recetas->isEmpty())
            <p class="text-gray-500">No hay recetas registradas para este paciente.</p>
            @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 text-left border-b-2 border-gray-200">Fecha</th>
                            <th class="p-3 text-left border-b-2 border-gray-200">Médico</th>
                            <th class="p-3 text-left border-b-2 border-gray-200 w-72">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recetas as $receta)
                        <tr class="border-b border-gray-200">
                            <td class="p-3">{{ $receta->fecha_receta }}</td>
                            <td class="p-3">{{ $receta->personalMedico->usuario->nombre ?? 'No registrado' }}</td>
                            <td class="p-3">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('recetas.edit', [$receta->id_historial, $receta->id_receta]) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        Editar
                                    </a>
                                    <button class="btn-delete px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition"
                                        data-url="{{ route('recetas.destroy', [$receta->id_historial, $receta->id_receta]) }}">
                                        Eliminar
                                    </button>
                                    <a href="{{ route('medicamentos.index', $receta->id_receta) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                        Ver Medicamentos
                                    </a>
                                    <a href="{{ route('medicamentos.create', $receta->id_receta) }}"
                                        class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                        Añadir Medicamento
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @elseif ($dni)
            <p class="text-red-500">No se encontró ningún paciente con el DNI ingresado.</p>
            @else
            <p class="text-gray-500">Ingrese un DNI para buscar un paciente.</p>
            @endif

            @if ($paciente && $paciente->historialClinico->isNotEmpty())
            <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                Regresar al Historial
            </a>
            @endif
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('¿Confirma eliminar esta receta?')) return;

            const url = this.getAttribute('data-url');
            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Receta eliminada exitosamente.');
                        location.reload();
                    } else {
                        alert('Error al eliminar la receta.');
                    }
                })
                .catch(() => {
                    alert('Error al eliminar la receta.');
                });
        });
    });
</script>
@endsection