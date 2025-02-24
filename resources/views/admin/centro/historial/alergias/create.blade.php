@extends($layout)

@section('title', 'Registrar Nueva Alergia')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-4">
            <h2 class="text-white text-2xl font-bold">
                Registrar Nueva Alergia para {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
            </h2>
        </div>
        <form action="{{ route('alergias.store', $paciente->id_paciente) }}" method="POST" class="p-6">
            @csrf
            <div class="mb-4">
                <label for="tipo" class="block font-bold mb-1">Tipo de Alergia</label>
                <input type="text" name="tipo" id="tipo" required class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block font-bold mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" required class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 h-24"></textarea>
            </div>
            <div class="mb-4">
                <label for="severidad" class="block font-bold mb-1">Severidad</label>
                <select name="severidad" id="severidad" required class="w-full p-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="leve">Leve</option>
                    <option value="moderada">Moderada</option>
                    <option value="severa">Severa</option>
                </select>
            </div>
            <div class="flex justify-between mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg border border-black">
                    Registrar
                </button>
                <a href="{{ route('alergias.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
