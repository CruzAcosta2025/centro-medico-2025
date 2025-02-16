@extends($layout)

@section('title', 'Añadir Medicamento')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 20px; width: 95%;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #10b981, #059669); padding: 20px;">
            <h2 style="color: #ffffff; font-size: clamp(20px, 4vw, 24px); margin: 0;">Añadir Medicamento</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div style="padding: 20px;">
            <form action="{{ route('medicamentos.store', $receta->id_receta) }}" method="POST">
                @csrf

                <!-- Medicamento -->
                <div style="margin-bottom: 20px;">
                    <label for="medicamento" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Nombre del Medicamento
                    </label>
                    <input
                        type="text"
                        name="medicamento"
                        id="medicamento"
                        value="{{ old('medicamento') }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                        required
                    >
                </div>

                <!-- Dosis -->
                <div style="margin-bottom: 20px;">
                    <label for="dosis" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Dosis
                    </label>
                    <input
                        type="text"
                        name="dosis"
                        id="dosis"
                        value="{{ old('dosis') }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                        required
                    >
                </div>

                <!-- Frecuencia -->
                <div style="margin-bottom: 20px;">
                    <label for="frecuencia" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Frecuencia
                    </label>
                    <input
                        type="text"
                        name="frecuencia"
                        id="frecuencia"
                        value="{{ old('frecuencia') }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                        required
                    >
                </div>

                <!-- Duración -->
                <div style="margin-bottom: 20px;">
                    <label for="duracion" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Duración
                    </label>
                    <input
                        type="text"
                        name="duracion"
                        id="duracion"
                        value="{{ old('duracion') }}"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; outline: none;"
                        required
                    >
                </div>

                <!-- Instrucciones -->
                <div style="margin-bottom: 20px;">
                    <label for="instrucciones" style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">
                        Instrucciones (Opcional)
                    </label>
                    <textarea
                        name="instrucciones"
                        id="instrucciones"
                        rows="5"
                        style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #d1d5db; border-radius: 6px; resize: vertical; outline: none;"
                    >{{ old('instrucciones') }}</textarea>
                </div>

                <!-- Botones de acción -->
                <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 30px; gap: 10px;">
                    <a
                        href="{{ route('medicamentos.index', $receta->id_receta) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px; text-align: center; min-width: 120px;"
                    >
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        style="padding: 10px 20px; background-color: #059669; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; min-width: 120px;"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
