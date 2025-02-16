@extends($layout)

@section('title', 'Exámenes Médicos')

@section('content')
<div class="card">
    <h2 class="text-xl font-bold mb-4">Exámenes Médicos</h2>

    <form action="{{ route('examenes.buscar') }}" method="GET" class="mb-4">
        @csrf
        <label for="dni" class="block font-bold mb-2">Buscar por DNI del Paciente:</label>
        <input type="text" id="dni" name="dni" class="form-input mb-2" placeholder="Ingrese DNI" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if ($historial)
        <h3>Paciente: {{ $historial->paciente->primer_nombre }} {{ $historial->paciente->primer_apellido }}</h3>
        <ul>
            @foreach ($examenes as $examen)
                <li>
                    <strong>{{ $examen->tipo_examen }}</strong> - {{ $examen->fecha_examen }}
                    <a href="{{ route('examenes.edit', [$historial->id_historial, $examen->id_examen]) }}" class="btn btn-edit">Editar</a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('examenes.create', $historial->id_historial) }}" class="btn btn-add mt-4">Agregar Examen</a>
    @endif

    <a href="{{ route('historial.show', $historial->id_historial ?? 0) }}" class="btn btn-back mt-4">Regresar al Historial</a>
</div>
@endsection


<style>
    .btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #4caf50;
        color: white;
    }

    .btn-primary:hover {
        background-color: #45a049;
    }

    .btn-add {
        background-color: #007bff;
        color: white;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }

    .btn-view {
        background-color: #6c757d;
        color: white;
    }

    .btn-view:hover {
        background-color: #5a6268;
    }
</style>
