@extends($layout)

@section('title', 'Listado de Cirugías')

@section('content')
<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #22c55e, #16a34a); padding: 20px;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">Listado de Cirugías</h2>
        </div>
        <div style="padding: 20px;">
            <!-- Buscador DNI -->
            <form method="GET" action="{{ route('cirugias.index') }}" style="margin-bottom: 20px;">
                <div style="display: flex;">
                    <input type="text" name="dni" value="{{ $dni }}" placeholder="Buscar por DNI" style="flex-grow: 1; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px 0 0 4px;">
                    <button type="submit" style="padding: 8px 16px; background-color: #22c55e; color: #ffffff; border: none; border-radius: 0 4px 4px 0; cursor: pointer;">Buscar</button>
                </div>
            </form>

            @if ($paciente)
                <h3 style="margin-bottom: 20px;">Paciente: {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</h3>
                @if ($paciente->historialClinico->isNotEmpty())
                    <a href="{{ route('cirugias.create', $paciente->historialClinico->first()->id_historial) }}" style="display: inline-block; padding: 10px 20px; background-color: #16a34a; color: #ffffff; text-decoration: none; border-radius: 4px; margin-bottom: 20px;">Nueva Cirugía</a>
                @else
                    <p style="color: #ef4444; margin-bottom: 20px;">El paciente no tiene un historial clínico.</p>
                @endif

                @if ($cirugias->isEmpty())
                    <p style="color: #6b7280; margin-bottom: 20px;">No hay cirugías registradas para este paciente.</p>
                @else
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f3f4f6;">
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Tipo</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Fecha</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Cirujano</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cirugias as $cirugia)
                                <tr>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $cirugia->tipo_cirugia }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $cirugia->fecha_cirugia }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $cirugia->cirujano }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                        <a href="{{ route('cirugias.edit', [$cirugia->id_historial, $cirugia->id_cirugia]) }}" style="display: inline-block; padding: 6px 12px; background-color: #f59e0b; color: #ffffff; text-decoration: none; border-radius: 4px; margin-right: 5px;">Editar</a>
                                        <button class="btn-delete" data-url="{{ route('cirugias.destroy', [$cirugia->id_historial, $cirugia->id_cirugia]) }}" style="padding: 6px 12px; background-color: #ef4444; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @elseif ($dni)
                <p style="color: #ef4444; margin-bottom: 20px;">No se encontró ningún paciente con el DNI ingresado.</p>
            @else
                <p style="color: #6b7280; margin-bottom: 20px;">Ingrese un DNI para buscar un paciente.</p>
            @endif

            <!-- Enlace para regresar al historial del paciente -->
            @if ($paciente && $paciente->historialClinico->isNotEmpty())
                <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}" style="display: inline-block; padding: 10px 20px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 4px; margin-top: 20px;">Regresar al Historial</a>
            @endif
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            if (!confirm('¿Confirma eliminar esta cirugía?')) return;

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
                    alert('Cirugía eliminada exitosamente.');
                    location.reload();
                } else {
                    alert('Error al eliminar la cirugía.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la cirugía.');
            });
        });
    });
</script>
@endsection
