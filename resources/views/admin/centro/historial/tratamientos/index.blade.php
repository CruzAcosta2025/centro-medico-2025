@extends($layout)

@section('title', 'Listado de Tratamientos')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #3b82f6, #1e40af); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Listado de Tratamientos</h2>
        </div>

        <div style="padding: 20px;">
            <!-- Buscador por DNI -->
            <form method="GET" action="{{ route('tratamientos.index') }}" style="margin-bottom: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                    <input
                        type="text"
                        name="dni"
                        value="{{ $dni }}"
                        placeholder="Buscar por DNI"
                        style="flex: 1; min-width: 200px; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;"
                    >
                    <button
                        type="submit"
                        style="padding: 8px 16px; background-color: #3b82f6; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;"
                    >
                        Buscar
                    </button>
                </div>
            </form>

            @if ($paciente)
                <h3 style="margin-bottom: 20px;">Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</h3>

                @if ($paciente->historialClinico->isNotEmpty())
                    <a href="{{ route('tratamientos.create', $paciente->historialClinico->first()->id_historial) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #1e40af; color: #ffffff; text-decoration: none; border-radius: 4px; margin-bottom: 20px;">
                        Nuevo Tratamiento
                    </a>
                @else
                    <p style="color: #ef4444;">El paciente no tiene un historial clínico.</p>
                @endif

                @if ($tratamientos->isEmpty())
                    <p style="color: #6b7280;">No hay tratamientos registrados para este paciente.</p>
                @else
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                            <thead>
                                <tr style="background-color: #f3f4f6;">
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Fecha</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Descripción</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; width: 200px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tratamientos as $tratamiento)
                                    <tr>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $tratamiento->fecha_creacion }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $tratamiento->descripcion }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                <a href="{{ route('tratamientos.edit', [$tratamiento->id_historial, $tratamiento->id_tratamiento]) }}"
                                                    style="padding: 6px 12px; background-color: #f59e0b; color: #ffffff; text-decoration: none; border-radius: 4px;">
                                                    Editar
                                                </a>
                                                <button class="btn-delete"
                                                    data-url="{{ route('tratamientos.destroy', [$tratamiento->id_historial, $tratamiento->id_tratamiento]) }}"
                                                    style="padding: 6px 12px; background-color: #ef4444; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                                                    Eliminar
                                                </button>
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
            if (!confirm('¿Confirma eliminar este tratamiento?')) return;

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
                    alert('Tratamiento eliminado exitosamente.');
                    location.reload();
                } else {
                    alert('Error al eliminar el tratamiento.');
                }
            })
            .catch(() => {
                alert('Error al eliminar el tratamiento.');
            });
        });
    });
</script>
@endsection
