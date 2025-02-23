@extends($layout)

@section('title', 'Listado de Recetas')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #f43f5e, #e11d48); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Listado de Recetas</h2>
        </div>

        <div style="padding: 20px;">
            <form method="GET" action="{{ route('recetas.index') }}" style="margin-bottom: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                    <input
                        type="text"
                        name="dni"
                        value="{{ $dni }}"
                        placeholder="Buscar por DNI"
                        style="flex: 1; min-width: 200px; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
                    <button
                        type="submit"
                        style="padding: 8px 16px; background-color: #f43f5e; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                        Buscar
                    </button>
                </div>
            </form>

            @if ($paciente)
            <h3 style="margin-bottom: 20px;">Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</h3>

            @if ($paciente->historialClinico->isNotEmpty())
            <a href="{{ route('recetas.create', $paciente->historialClinico->first()->id_historial) }}"
                style="display: inline-block; padding: 10px 20px; background-color: #e11d48; color: #ffffff; text-decoration: none; border-radius: 4px; margin-bottom: 20px;">
                Nueva Receta
            </a>
            @else
            <p style="color: #ef4444;">El paciente no tiene un historial clínico.</p>
            @endif

            @if ($recetas->isEmpty())
            <p style="color: #6b7280;">No hay recetas registradas para este paciente.</p>
            @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Fecha</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Médico</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; width: 300px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recetas as $receta)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $receta->fecha_receta }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $receta->personalMedico->usuario->nombre ?? 'No registrado' }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                    <a href="{{ route('recetas.edit', [$receta->id_historial, $receta->id_receta]) }}"
                                        style="padding: 6px 12px; background-color: #f59e0b; color: #ffffff; text-decoration: none; border-radius: 4px;">
                                        Editar
                                    </a>
                                    <button class="btn-delete"
                                        data-url="{{ route('recetas.destroy', [$receta->id_historial, $receta->id_receta]) }}"
                                        style="padding: 6px 12px; background-color: #ef4444; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                                        Eliminar
                                    </button>
                                    <a href="{{ route('medicamentos.index', $receta->id_receta) }}"
                                        style="padding: 6px 12px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 4px;">
                                        Ver Medicamentos
                                    </a>
                                    <a href="{{ route('medicamentos.create', $receta->id_receta) }}"
                                        style="padding: 6px 12px; background-color: #22c55e; color: #ffffff; text-decoration: none; border-radius: 4px;">
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
            <p style="color: #ef4444;">No se encontró ningún paciente con el DNI ingresado.</p>
            @else
            <p style="color: #6b7280;">Ingrese un DNI para buscar un paciente.</p>
            @endif

            @if ($paciente && $paciente->historialClinico->isNotEmpty())
            <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                style="display: inline-block; padding: 10px 20px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 4px;">
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