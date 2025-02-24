@extends($layout)

@section('title', 'Registrar Tratamiento')

@section('content')
<div class="max-w-3xl mx-auto p-6 w-11/12">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-900 p-5 rounded-t-lg">
            <h2 class="text-white text-xl md:text-2xl font-bold">Registrar Tratamiento</h2>
        </div>

        <!-- Contenido del Formulario -->
        <div class="p-6">
            <form action="{{ route('tratamientos.store', $historial->id_historial) }}" method="POST">
                @csrf

                <!-- Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block font-bold text-gray-800 mb-1">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="6"
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-500 resize-y">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de Creación -->
                <div class="mb-4">
                    <label for="fecha_creacion" class="block font-bold text-gray-800 mb-1">Fecha de Creación</label>
                    <input type="date" name="fecha_creacion" id="fecha_creacion"
                        value="{{ old('fecha_creacion', now()->format('Y-m-d')) }}"
                        class="w-full p-3 border border-black rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-500">
                    @error('fecha_creacion')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('historial.show', $historial->id_historial) }}"
                        class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-lg border border-black">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
