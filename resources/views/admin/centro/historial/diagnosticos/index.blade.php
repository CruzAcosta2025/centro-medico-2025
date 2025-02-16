@extends($layout)

@section('title', 'Listado de Diagnósticos')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #2563eb, #1e40af); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Listado de Diagnósticos</h2>
        </div>

        <div style="padding: 20px;">
            <!-- Buscador DNI -->
            <form method="GET" action="{{ route('diagnosticos.index') }}" style="margin-bottom: 20px;">
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
                        style="padding: 8px 16px; background-color: #2563eb; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; white-space: nowrap;"
                    >
                        Buscar
                    </button>
                </div>
            </form>

            @if ($paciente)
                <h3 style="margin-bottom: 20px; font-size: clamp(16px, 3vw, 18px);">
                    Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
                </h3>

                @if ($paciente->historialClinico->isNotEmpty())
                    <a
                        href="{{ route('diagnosticos.create', $paciente->historialClinico->first()->id_historial) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #1e40af; color: #ffffff; text-decoration: none; border-radius: 4px; margin-bottom: 20px;"
                    >
                        Nuevo Diagnóstico
                    </a>
                @else
                    <p style="color: #ef4444; margin-bottom: 20px;">El paciente no tiene un historial clínico.</p>
                @endif

                @if ($diagnosticos->isEmpty())
                    <p style="color: #6b7280; margin-bottom: 20px;">No hay diagnósticos registrados para este paciente.</p>
                @else
                    <div style="overflow-x: auto; margin-bottom: 20px;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                            <thead>
                                <tr style="background-color: #f3f4f6;">
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Fecha</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Descripción</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; width: 200px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnosticos as $diagnostico)
                                    <tr>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $diagnostico->fecha_creacion }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $diagnostico->descripcion }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                            <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                                <a
                                                    href="{{ route('diagnosticos.edit', [$diagnostico->id_historial, $diagnostico->id_diagnostico]) }}"
                                                    style="padding: 6px 12px; background-color: #f59e0b; color: #ffffff; text-decoration: none; border-radius: 4px; text-align: center; min-width: 80px;"
                                                >
                                                    Editar
                                                </a>
                                                <button
                                                    class="btn-delete"
                                                    data-url="{{ route('diagnosticos.destroy', [$diagnostico->id_historial, $diagnostico->id_diagnostico]) }}"
                                                    style="padding: 6px 12px; background-color: #ef4444; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; min-width: 80px;"
                                                >
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
                <p style="color: #ef4444; margin-bottom: 20px;">No se encontró ningún paciente con el DNI ingresado.</p>
            @else
                <p style="color: #6b7280; margin-bottom: 20px;">Ingrese un DNI para buscar un paciente.</p>
            @endif

            <!-- Enlace para regresar -->
            @if ($paciente && $paciente->historialClinico->isNotEmpty())
                <a
                    href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                    style="display: inline-block; padding: 10px 20px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 4px;"
                >
                    Regresar al Historial
                </a>
            @endif
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('¿Confirma eliminar este diagnóstico?')) return;

            const url = this.getAttribute('data-url');
            const token = '{{ csrf_token() }}';

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Diagnóstico eliminado exitosamente.');
                    location.reload();
                } else {
                    alert('Error al eliminar el diagnóstico.');
                }
            })
            .catch(() => {
                alert('Error al eliminar el diagnóstico.');
            });
        });
    });
</script>
@endsection
