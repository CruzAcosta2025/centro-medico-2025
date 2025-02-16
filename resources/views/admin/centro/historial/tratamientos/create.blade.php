@extends($layout)

@section('title', 'Registrar Tratamiento')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #3b82f6, #1e40af); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Registrar Tratamiento</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div style="padding: 20px;">
            <form action="{{ route('tratamientos.store', $historial->id_historial) }}" method="POST">
                @csrf

                <!-- Descripción -->
                <div style="margin-bottom: 20px;">
                    <label for="descripcion" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Descripción
                    </label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        rows="8"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; resize: vertical;"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span style="color: red; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de Creación -->
                <div style="margin-bottom: 20px;">
                    <label for="fecha_creacion" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Fecha de Creación
                    </label>
                    <input
                        type="date"
                        name="fecha_creacion"
                        id="fecha_creacion"
                        value="{{ old('fecha_creacion', now()->format('Y-m-d')) }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px;"
                    >
                    @error('fecha_creacion')
                        <span style="color: red; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de Acción -->
                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="{{ route('historial.show', $historial->id_historial) }}"
                        style="padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px;">
                        Cancelar
                    </a>
                    <button type="submit"
                        style="padding: 10px 20px; background-color: #1e40af; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
