@extends($layout)

@section('title', 'Editar Diagnóstico')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #2563eb, #1e40af); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Editar Diagnóstico</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div style="padding: 20px;">
            <form action="{{ route('diagnosticos.update', [$diagnostico->id_historial, $diagnostico->id_diagnostico]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Fecha de creación -->
                <div style="margin-bottom: 20px;">
                    <label for="fecha_creacion" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Fecha de Creación
                    </label>
                    <input
                        type="date"
                        name="fecha_creacion"
                        id="fecha_creacion"
                        value="{{ old('fecha_creacion', $diagnostico->fecha_creacion) }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                    >
                </div>

                <!-- Descripción -->
                <div style="margin-bottom: 20px;">
                    <label for="descripcion" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Descripción
                    </label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        rows="9"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; resize: vertical; min-height: 120px; outline: none;"
                    >{{ old('descripcion', $diagnostico->descripcion) }}</textarea>
                </div>

                <!-- Botones de acción -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                    <a
                        href="{{ route('diagnosticos.index', ['dni' => $diagnostico->historialClinico->paciente->dni]) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px; text-align: center; min-width: 120px;"
                    >
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        style="padding: 10px 20px; background-color: #1e40af; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; min-width: 120px;"
                    >
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
