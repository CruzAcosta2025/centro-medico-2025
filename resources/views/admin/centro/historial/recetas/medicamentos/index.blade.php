@extends($layout)

@section('title', 'Medicamentos de la Receta')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #10b981, #059669); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 28px); margin: 0;">Medicamentos</h2>
        </div>

        <!-- Contenido -->
        <div style="padding: 20px;">
            <h3 style="margin-bottom: 20px; font-size: clamp(16px, 3vw, 22px);">
                Paciente: {{ $receta->historialClinico->paciente->primer_nombre }} {{ $receta->historialClinico->paciente->primer_apellido }}
            </h3>

            <a href="{{ route('medicamentos.create', $receta->id_receta) }}"
               style="display: inline-block; padding: 10px 20px; background-color: #059669; color: #ffffff; text-decoration: none; border-radius: 4px; margin-bottom: 20px; font-size: clamp(14px, 2vw, 16px);">
                Añadir Medicamento
            </a>

            @if ($medicamentos->isEmpty())
                <p style="color: #6b7280; margin-bottom: 20px; font-size: clamp(14px, 2vw, 16px);">No hay medicamentos registrados para esta receta.</p>
            @else
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                        <thead>
                            <tr style="background-color: #f3f4f6;">
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">Medicamento</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">Dosis</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">Frecuencia</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">Duración</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">Instrucciones</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e5e7eb; width: 200px; font-size: clamp(14px, 2vw, 16px);">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicamentos as $medicamento)
                                <tr>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">{{ $medicamento->medicamento }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">{{ $medicamento->dosis }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">{{ $medicamento->frecuencia }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; font-size: clamp(14px, 2vw, 16px);">{{ $medicamento->duracion }}</td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; max-width: 300px; word-wrap: break-word; font-size: clamp(14px, 2vw, 16px);">
                                        {!! nl2br(e($medicamento->instrucciones ?? 'Sin instrucciones')) !!}
                                    </td>
                                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                        <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: flex-start;">
                                            <a href="{{ route('medicamentos.edit', [$receta->id_receta, $medicamento->id_medicamento_receta]) }}"
                                               style="padding: 6px 12px; background-color: #f59e0b; color: #ffffff; text-decoration: none; border-radius: 4px; text-align: center; font-size: clamp(12px, 2vw, 14px);">
                                                Editar
                                            </a>
                                            <button
                                                class="btn-delete"
                                                data-url="{{ route('medicamentos.destroy', [$receta->id_receta, $medicamento->id_medicamento_receta]) }}"
                                                style="padding: 6px 12px; background-color: #ef4444; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; text-align: center; font-size: clamp(12px, 2vw, 14px);">
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

            <a href="{{ route('recetas.index', ['dni' => $receta->historialClinico->paciente->dni]) }}"
               style="display: inline-block; padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px; margin-top: 20px; font-size: clamp(14px, 2vw, 16px);">
                Regresar a Recetas
            </a>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('¿Confirma eliminar este medicamento?')) return;

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
                    alert('Medicamento eliminado exitosamente.');
                    location.reload();
                } else {
                    alert('Error al eliminar el medicamento.');
                }
            })
            .catch(() => {
                alert('Error al eliminar el medicamento.');
            });
        });
    });
</script>
@endsection
