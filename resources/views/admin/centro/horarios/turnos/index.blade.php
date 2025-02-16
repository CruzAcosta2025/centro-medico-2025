@extends($layout)

@section('title', 'Turnos Disponibles')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="font-size: 24px;">Especialistas Disponibles</h2>
        <p style="margin-bottom: 20px;">
            Turno actual: <strong>{{ ucfirst($diaActual) }}</strong>, Hora: <strong>{{ date('h:i A', strtotime($horaActual)) }}</strong>
        </p>
        @if ($horarios->isEmpty())
            <p>No hay especialistas disponibles en este momento.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 12px;">Nombre</th>
                        <th style="padding: 12px;">Especialidad</th>
                        <th style="padding: 12px;">Hora Inicio</th>
                        <th style="padding: 12px;">Hora Fin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td style="padding: 12px;">{{ $horario->personalMedico->usuario->nombre }}</td>
                            <td style="padding: 12px;">{{ $horario->personalMedico->especialidad->nombre_especialidad ?? 'Sin Especialidad' }}</td>
                            <td style="padding: 12px;">{{ date('h:i A', strtotime($horario->hora_inicio)) }}</td>
                            <td style="padding: 12px;">{{ date('h:i A', strtotime($horario->hora_fin)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
