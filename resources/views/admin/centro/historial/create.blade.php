@extends($layout)
@section('title', 'Crear Historial Clínico')

@section('content')
<div class="card">
    <h2 class="text-2xl font-bold mb-4">Crear Historial Clínico</h2>

    <form action="{{ route('historial.store', ['idPaciente' => $paciente->id_paciente]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion" required>
        </div>

        <button type="submit" class="btn btn-create">Guardar Historial</button>
        <a href="{{ route('historial.index') }}" class="btn btn-cancel">Cancelar</a>
    </form>
</div>
@endsection

<style>
.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn {
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    color: #fff;
    display: inline-block;
    margin-right: 5px;
}

.btn-create {
    background-color: #3b82f6;
}

.btn-cancel {
    background-color: #6b7280;
}

.btn:hover {
    opacity: 0.9;
}
</style>
