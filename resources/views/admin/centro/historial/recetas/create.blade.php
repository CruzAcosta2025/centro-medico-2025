@extends($layout)

@section('title', 'Registrar Receta')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #f43f5e, #e11d48); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Registrar Receta</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div style="padding: 20px;">
            <form action="{{ route('recetas.store', $historial->id_historial) }}" method="POST">
                @csrf

                <!-- Selección del Médico -->
                <div style="margin-bottom: 20px;">
                    <label for="id_medico" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Médico
                    </label>
                    <select name="id_medico" id="id_medico"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;">
                        <option value="">Seleccione un médico</option>
                        @foreach ($personalMedico as $medico)
                            <option value="{{ $medico->id_personal_medico }}">
                                {{ $medico->usuario->nombre }} - {{ $medico->especialidad->nombre_especialidad ?? 'Sin Especialidad' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha de la Receta -->
                <div style="margin-bottom: 20px;">
                    <label for="fecha_receta" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Fecha de la Receta
                    </label>
                    <input
                        type="date"
                        name="fecha_receta"
                        id="fecha_receta"
                        value="{{ old('fecha_receta') }}"
                        required
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                    >
                </div>

                <!-- Botones de acción -->
                <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                    <a
                        href="{{ route('recetas.index', ['dni' => $paciente->dni]) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px; text-align: center; min-width: 120px; font-weight: 600;"
                    >
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        style="padding: 10px 20px; background-color: #e11d48; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; min-width: 120px; font-weight: 600;"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
