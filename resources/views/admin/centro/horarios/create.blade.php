@extends($layout)

@section('title', 'Nuevo Horario Médico')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg border-2 border-black">
        <div class="px-6 py-4 bg-blue-900">
            <h2 class="text-3xl font-semibold text-white text-center">Nuevo Horario Médico</h2>
        </div>

        <form action="{{ route('horarios.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="id_personal_medico" class="block text-lg font-semibold text-gray-700">Personal Médico:</label>
                <select name="id_personal_medico" id="id_personal_medico" class="w-full p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Seleccione</option>
                    @foreach ($personalMedico as $medico)
                    <option value="{{ $medico->id_personal_medico }}">{{ $medico->usuario->nombre }}</option>
                    @endforeach
                </select>
                @error('id_personal_medico') <p class="text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="dia_semana" class="block text-lg font-semibold text-gray-700">Día de la Semana:</label>
                <select name="dia_semana" id="dia_semana" class="w-full p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Seleccione</option>
                    @foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $dia)
                    <option value="{{ $dia }}">{{ $dia }}</option>
                    @endforeach
                </select>
                @error('dia_semana') <p class="text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-lg font-semibold text-gray-700">Hora Inicio:</label>
                <div class="flex gap-4">
                    <select name="hora_inicio_hora" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Hora</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                    <select name="hora_inicio_minuto" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Minutos</option>
                        @for ($i = 0; $i < 60; $i++)
                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                    </select>
                    <select name="hora_inicio_periodo" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-lg font-semibold text-gray-700">Hora Fin:</label>
                <div class="flex gap-4">
                    <select name="hora_fin_hora" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Hora</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                    <select name="hora_fin_minuto" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Minutos</option>
                        @for ($i = 0; $i < 60; $i++)
                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                    </select>
                    <select name="hora_fin_periodo" class="flex-1 p-3 border-2 border-black rounded-lg bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="px-20 py-3 bg-gray-300 text-gray-700 rounded-lg border-2 border-gray-500 hover:bg-gray-400">
                    Guardar
                </button>
                <a href="{{ route('horarios.index') }}" class="px-20 py-3 bg-gray-300 text-gray-700 rounded-lg border-2 border-gray-500 hover:bg-gray-400">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection