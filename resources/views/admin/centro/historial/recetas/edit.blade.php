@extends($layout)

@section('title', 'Editar Receta')

@section('content')
<div class="max-w-3xl mx-auto p-6 w-11/12">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-rose-500 to-red-600 p-5 rounded-t-lg">
            <h2 class="text-white text-xl md:text-2xl font-bold">Editar Receta</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-6">
            <form action="{{ route('recetas.update', [$receta->id_historial, $receta->id_receta]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Selección del Médico -->
                <div class="mb-4">
                    <label for="id_medico" class="block font-bold text-gray-800 mb-1">Médico</label>
                    <select name="id_medico" id="id_medico"
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-red-500">
                        <option value="">Seleccione un médico</option>
                        @foreach ($personalMedico as $medico)
                        @if ($medico->especialidad) {{-- Solo mostrar médicos con especialidad --}}
                        <option value="{{ $medico->id_personal_medico }}"
                            {{ $receta->id_medico == $medico->id_personal_medico ? 'selected' : '' }}>
                            {{ $medico->usuario->nombre }} - {{ $medico->especialidad->nombre_especialidad }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <!-- Fecha de la Receta -->
                <div class="mb-4">
                    <label for="fecha_receta" class="block font-bold text-gray-800 mb-1">Fecha de la Receta</label>
                    <input type="date" name="fecha_receta" id="fecha_receta"
                        value="{{ old('fecha_receta', $receta->fecha_receta) }}"
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('recetas.index', ['dni' => $receta->historialClinico->paciente->dni]) }}"
                        class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg border border-black">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection