@extends($layout)

@section('title', 'Listado de Vacunas')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-xl">
    <div class="bg-gradient-to-r from-green-500 to-green-700 p-4 rounded-t-xl">
        <h2 class="text-white text-xl font-semibold">Listado de Vacunas</h2>
    </div>
    
    <div class="p-4">
        <!-- Buscador DNI -->
        <form method="GET" action="{{ route('vacunas.index') }}" class="mb-4 flex">
            <input type="text" name="dni" value="{{ $dni }}" placeholder="Buscar por DNI" class="w-full px-4 py-2 border rounded-l-lg shadow-sm focus:ring focus:ring-green-300">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-r-lg shadow-md hover:bg-green-700 transition">Buscar</button>
        </form>

        @if ($paciente)
            <h3 class="mb-4 font-semibold">Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</h3>
            @if ($paciente->historialClinico->isNotEmpty())
                <div class="flex gap-2 mb-4">
                    <a href="{{ route('vacunas.create', $paciente->historialClinico->first()->id_historial) }}" class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-800 transition">+ Nueva Vacuna</a>
                    <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition">Volver al Historial</a>
                </div>
            @else
                <p class="text-red-600 mb-4">El paciente no tiene un historial clínico.</p>
            @endif

            @if ($vacunas->isEmpty())
                <p class="text-gray-500 mb-4">No hay vacunas registradas para este paciente.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full bg-green-100 border border-green-600 rounded-lg shadow-md">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Nombre</th>
                                <th class="px-4 py-2 text-left">Fecha Aplicación</th>
                                <th class="px-4 py-2 text-left">Dosis</th>
                                <th class="px-4 py-2 text-left">Próxima Dosis</th>
                                <th class="px-4 py-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacunas as $vacuna)
                                <tr class="border-b border-green-500 hover:bg-green-200 transition">
                                    <td class="px-4 py-2">{{ $vacuna->nombre_vacuna }}</td>
                                    <td class="px-4 py-2">{{ $vacuna->fecha_aplicacion }}</td>
                                    <td class="px-4 py-2">{{ $vacuna->dosis }}</td>
                                    <td class="px-4 py-2">{{ $vacuna->proxima_dosis ?? 'No programada' }}</td>
                                    <td class="px-4 py-2 flex justify-center gap-2">
                                        <a href="{{ route('vacunas.edit', [$vacuna->id_historial, $vacuna->id_vacuna]) }}" class="bg-yellow-600 text-white px-3 py-2 rounded-md hover:bg-yellow-700 transition">Editar</a>
                                        <button class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition btn-delete" data-url="{{ route('vacunas.destroy', [$vacuna->id_historial, $vacuna->id_vacuna]) }}">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @elseif ($dni)
            <p class="text-red-600">No se encontró ningún paciente con el DNI ingresado.</p>
        @else
            <p class="text-gray-500">Ingrese un DNI para buscar un paciente.</p>
        @endif
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            if (!confirm('¿Confirma eliminar esta vacuna?')) return;

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
                    alert('Vacuna eliminada exitosamente.');
                    window.location.href = '{{ route('vacunas.index') }}?dni=' + data.dni;
                } else {
                    alert('Error al eliminar la vacuna.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la vacuna.');
            });
        });
    });
</script>
@endsection