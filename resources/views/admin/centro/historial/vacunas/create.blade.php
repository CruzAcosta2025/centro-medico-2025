@extends($layout)

@section('title', 'Registrar Nueva Vacuna')

@section('content')
<div class="max-w-lg mx-auto p-6 w-11/12">
    <div class="bg-white border-2 border-black rounded-lg shadow-lg overflow-hidden">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-green-500 to-green-700 p-4">
            <h2 class="text-white text-xl font-bold">
                Registrar Nueva Vacuna para {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
            </h2>
        </div>

        <!-- Formulario -->
        <div class="p-6">
            <form action="{{ route('vacunas.store', $historial->id_historial) }}" method="POST">
                @csrf

                <!-- Nombre de la Vacuna -->
                <div class="mb-4">
                    <label for="nombre_vacuna" class="block font-bold mb-1">Nombre de la Vacuna</label>
                    <input type="text" name="nombre_vacuna" id="nombre_vacuna" required
                        class="w-full p-3 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 bg-gray-100">
                </div>

                <!-- Fecha de Aplicación -->
                <div class="mb-4">
                    <label for="fecha_aplicacion" class="block font-bold mb-1">Fecha de Aplicación</label>
                    <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required
                        class="w-full p-3 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 bg-gray-100">
                </div>

                <!-- Dosis -->
                <div class="mb-4">
                    <label for="dosis" class="block font-bold mb-1">Dosis</label>
                    <input type="text" name="dosis" id="dosis" required
                        class="w-full p-3 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 bg-gray-100">
                </div>

                <!-- Próxima Dosis -->
                <div class="mb-4">
                    <label for="proxima_dosis" class="block font-bold mb-1">Próxima Dosis</label>
                    <input type="date" name="proxima_dosis" id="proxima_dosis"
                        class="w-full p-3 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 bg-gray-100">
                </div>

                <!-- Observaciones -->
                <div class="mb-4">
                    <label for="observaciones" class="block font-bold mb-1">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" rows="4"
                        class="w-full p-3 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 bg-gray-100 resize-y"></textarea>
                </div>

                <!-- Botones -->
                <div class="flex justify-end items-center mt-6 space-x-4">
                    <a href="{{ route('vacunas.index', ['dni' => $paciente->dni]) }}"
                        class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg border border-black">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg border border-black">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection