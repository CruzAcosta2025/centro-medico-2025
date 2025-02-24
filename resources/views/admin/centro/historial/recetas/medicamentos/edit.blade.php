@extends($layout)

@section('title', 'Editar Medicamento')

@section('content')
<div class="max-w-3xl mx-auto p-6 w-11/12">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-5 rounded-t-lg">
            <h2 class="text-white text-xl md:text-2xl font-bold">Editar Medicamento</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-6">
            <form action="{{ route('medicamentos.update', [$receta->id_receta, $medicamento->id_medicamento_receta]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Medicamento -->
                <div class="mb-4">
                    <label for="medicamento" class="block font-bold text-gray-800 mb-1">Nombre del Medicamento</label>
                    <input type="text" name="medicamento" id="medicamento"
                        value="{{ old('medicamento', $medicamento->medicamento) }}" required
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Dosis -->
                <div class="mb-4">
                    <label for="dosis" class="block font-bold text-gray-800 mb-1">Dosis</label>
                    <input type="text" name="dosis" id="dosis"
                        value="{{ old('dosis', $medicamento->dosis) }}" required
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Frecuencia -->
                <div class="mb-4">
                    <label for="frecuencia" class="block font-bold text-gray-800 mb-1">Frecuencia</label>
                    <input type="text" name="frecuencia" id="frecuencia"
                        value="{{ old('frecuencia', $medicamento->frecuencia) }}" required
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Duración -->
                <div class="mb-4">
                    <label for="duracion" class="block font-bold text-gray-800 mb-1">Duración</label>
                    <input type="text" name="duracion" id="duracion"
                        value="{{ old('duracion', $medicamento->duracion) }}" required
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Instrucciones -->
                <div class="mb-4">
                    <label for="instrucciones" class="block font-bold text-gray-800 mb-1">Instrucciones (Opcional)</label>
                    <textarea name="instrucciones" id="instrucciones" rows="4"
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-green-500 resize-y">{{ old('instrucciones', $medicamento->instrucciones) }}</textarea>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('medicamentos.index', $receta->id_receta) }}"
                        class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-lg border border-black">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection