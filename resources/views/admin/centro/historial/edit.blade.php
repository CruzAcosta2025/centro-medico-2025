@extends($layout)

@section('title', 'Editar Historial Clínico')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h2 class="text-3xl font-bold text-orange-600 mb-6">Editar Historial Clínico</h2>

        <form action="{{ route('historial.update', $historial->id_historial) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="fecha_creacion" class="block text-lg font-medium text-gray-700">Fecha de Creación</label>
                <input type="date" name="fecha_creacion" id="fecha_creacion" value="{{ $historial->fecha_creacion }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none transition duration-300">
                    Guardar Cambios
                </button>
                <a href="{{ route('historial.index') }}"
                    class="px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none transition duration-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
