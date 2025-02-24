@extends($layout)

@section('title', 'Editar Alergia')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-4">
            <h2 class="text-white text-2xl font-bold">Editar Alergia</h2>
        </div>
        <form action="{{ route('alergias.update', [$paciente->id_paciente, $alergia->id_alergia]) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tipo" class="block font-bold mb-1">Tipo</label>
                <input type="text" name="tipo" id="tipo" value="{{ $alergia->tipo }}" required
                    class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 bg-gray-100">
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block font-bold mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" required
                    class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 bg-gray-100 h-24">{{ $alergia->descripcion }}</textarea>
            </div>
            <div class="mb-4">
                <label for="severidad" class="block font-bold mb-1">Severidad</label>
                <select name="severidad" id="severidad" required
                    class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 bg-gray-100">
                    <option value="leve" {{ $alergia->severidad == 'leve' ? 'selected' : '' }}>Leve</option>
                    <option value="moderada" {{ $alergia->severidad == 'moderada' ? 'selected' : '' }}>Moderada</option>
                    <option value="severa" {{ $alergia->severidad == 'severa' ? 'selected' : '' }}>Severa</option>
                </select>
            </div>
            <div class="flex justify-between mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg border border-black">
                    Actualizar
                </button>
                <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection