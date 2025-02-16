@extends($layout)
@section('title', 'Editar Solicitud de Sangre')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h2 style="text-align: center; margin-bottom: 20px; color: #004643;">Editar Solicitud de Sangre</h2>

    <form action="{{ route('sangre.solicitudes.update', $solicitud->id_solicitud) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Paciente Nombre -->
        <div style="margin-bottom: 15px;">
            <label for="paciente_nombre" style="display: block; font-weight: bold;">Nombre del Paciente:</label>
            <input type="text" id="paciente_nombre" name="paciente_nombre" value="{{ $solicitud->paciente_nombre }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <!-- Tipo de Sangre -->
        <div style="margin-bottom: 15px;">
            <label for="tipo_sangre" style="display: block; font-weight: bold;">Tipo de Sangre:</label>
            <select id="tipo_sangre" name="tipo_sangre" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $tipo)
                    <option value="{{ $tipo }}" {{ $solicitud->tipo_sangre == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
        </div>

        <!-- Cantidad -->
        <div style="margin-bottom: 15px;">
            <label for="cantidad" style="display: block; font-weight: bold;">Cantidad de Unidades:</label>
            <input type="number" id="cantidad" name="cantidad" value="{{ $solicitud->cantidad }}" min="1" max="10"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <!-- Motivo -->
        <div style="margin-bottom: 15px;">
            <label for="motivo" style="display: block; font-weight: bold;">Motivo:</label>
            <textarea id="motivo" name="motivo" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">{{ $solicitud->motivo }}</textarea>
        </div>

        <!-- Botones -->
        <div style="text-align: center;">
            <button type="submit" style="background: #004643; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">Guardar</button>
            <a href="{{ route('sangre.solicitudes.index') }}" style="padding: 10px 20px; background: #e63946; color: #fff; border-radius: 4px; text-decoration: none;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
