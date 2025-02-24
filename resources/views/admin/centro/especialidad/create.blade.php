@extends($layout)

@section('title', 'Agregar Especialidad')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-lg border-2 border-black">
        <div class="px-6 py-4 bg-blue-900 rounded-t-lg">
            <h2 class="text-3xl font-semibold text-white text-center">Agregar Especialidad</h2>
        </div>

        <form action="{{ route('especialidad.store') }}" method="POST" class="space-y-4 mt-4">
            @csrf

            <div>
                <label for="nombre_especialidad" class="block font-semibold text-gray-700">Nombre de la Especialidad:</label>
                <input type="text" name="nombre_especialidad" id="nombre_especialidad" value="{{ old('nombre_especialidad') }}" required
                    placeholder="Ej: Cardiología"
                    class="w-full p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="descripcion" class="block font-semibold text-gray-700">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" placeholder="Escribe una breve descripción..."
                    class="w-full p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg border-2 border-gray-500 hover:bg-gray-400">
                    Guardar
                </button>
                <a href="{{ route('especialidad.index') }}" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg border-2 border-gray-500 hover:bg-gray-400">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection