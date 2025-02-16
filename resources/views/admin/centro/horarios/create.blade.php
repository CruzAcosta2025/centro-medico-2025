@extends($layout)

@section('title', 'Nuevo Horario Médico')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <form action="{{ route('horarios.store') }}" method="POST"
        style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        @csrf
        <div>
            <label for="id_personal_medico">Personal Médico</label>
            <select name="id_personal_medico" id="id_personal_medico"
                style="width: 100%; padding: 10px; margin-bottom: 20px;">
                <option value="">Seleccione</option>
                @foreach ($personalMedico as $medico)
                    <option value="{{ $medico->id_personal_medico }}">{{ $medico->usuario->nombre }}</option>
                @endforeach
            </select>
            @error('id_personal_medico')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="dia_semana">Día de la Semana</label>
            <select name="dia_semana" id="dia_semana" style="width: 100%; padding: 10px; margin-bottom: 20px;">
                <option value="">Seleccione</option>
                @foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $dia)
                    <option value="{{ $dia }}">{{ $dia }}</option>
                @endforeach
            </select>
            @error('dia_semana')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Hora Inicio</label>
            <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                <select name="hora_inicio_hora" style="flex: 1; padding: 10px;">
                    <option value="">Hora</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select name="hora_inicio_minuto" style="flex: 1; padding: 10px;">
                    <option value="">Minutos</option>
                    @for ($i = 0; $i < 60; $i++)
                        <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
                <select name="hora_inicio_periodo" style="flex: 1; padding: 10px;">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
            </div>
            @error('hora_inicio_hora') <p style="color: red;">{{ $message }}</p> @enderror
            @error('hora_inicio_minuto') <p style="color: red;">{{ $message }}</p> @enderror
            @error('hora_inicio_periodo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div>
            <label>Hora Fin</label>
            <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                <select name="hora_fin_hora" style="flex: 1; padding: 10px;">
                    <option value="">Hora</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select name="hora_fin_minuto" style="flex: 1; padding: 10px;">
                    <option value="">Minutos</option>
                    @for ($i = 0; $i < 60; $i++)
                        <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
                <select name="hora_fin_periodo" style="flex: 1; padding: 10px;">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
            </div>
            @error('hora_fin_hora') <p style="color: red;">{{ $message }}</p> @enderror
            @error('hora_fin_minuto') <p style="color: red;">{{ $message }}</p> @enderror
            @error('hora_fin_periodo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
        <div style="display: flex; justify-content: flex-end; gap: 10px;">
            <button type="submit"
                style="padding: 10px 20px; background-color: #4f46e5; color: #ffffff; border: none; border-radius: 6px;">
                Guardar
            </button>
            <a href="{{ route('horarios.index') }}"
                style="padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
