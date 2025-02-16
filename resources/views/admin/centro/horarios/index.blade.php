@extends($layout)

@section('title', 'Gestión de Horarios')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 24px;">Gestión de Horarios</h2>
            <a href="{{ route('horarios.create') }}"
                style="padding: 10px 20px; background-color: #10b981; color: white; text-decoration: none; border-radius: 6px;">
                Nuevo Horario
            </a>
        </div>

        <form method="GET" action="{{ route('horarios.index') }}" style="margin-bottom: 20px;">
            <div style="display: flex; gap: 10px;">
                <input
                    type="text"
                    name="dni"
                    value="{{ $dni }}"
                    placeholder="Buscar por DNI"
                    style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                <button type="submit"
                    style="padding: 10px 20px; background-color: #2563eb; color: white; border: none; border-radius: 6px;">
                    Buscar
                </button>
            </div>
        </form>

        @if ($horarios->isEmpty())
            <p style="color: #666;">No se encontraron horarios registrados.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #f3f4f6;">
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Día</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Hora Inicio</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Hora Fin</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Personal Médico</th>
                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td style="padding: 12px;">{{ $horario->dia_semana }}</td>
                            <td style="padding: 12px;">{{ date('h:i A', strtotime($horario->hora_inicio)) }}</td>
                            <td style="padding: 12px;">{{ date('h:i A', strtotime($horario->hora_fin)) }}</td>
                            <td style="padding: 12px;">{{ $horario->personalMedico->usuario->nombre }}</td>
                            <td style="padding: 12px;">
                                <a href="{{ route('horarios.edit', $horario->id_horario) }}"
                                   style="padding: 6px 12px; background-color: #f59e0b; color: white; text-decoration: none; border-radius: 6px;">
                                   Editar
                                </a>
                                <form action="{{ route('horarios.destroy', $horario->id_horario) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="padding: 6px 12px; background-color: #ef4444; color: white; border: none; border-radius: 6px;">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection

