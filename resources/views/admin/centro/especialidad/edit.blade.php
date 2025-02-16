@extends($layout)

@section('title', 'Editar Especialidad')

@section('content')
<style>
    .container {
        max-width: 600px;
        margin: auto;
        padding: 1.5rem;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        font-weight: bold;
        margin-bottom: 0.5rem;
        display: block;
    }
    .form-input, .form-textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .form-textarea {
        resize: vertical;
    }
    .btn {
        background: #0d9488;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn:hover {
        background: #0f766e;
    }
    .btn-cancel {
        background: #e5e7eb;
        color: #374151;
    }
    .btn-cancel:hover {
        background: #d1d5db;
    }
</style>

<div class="container">
    <h2 class="text-2xl font-bold mb-4">Editar Especialidad</h2>

    <form action="{{ route('especialidad.update', $especialidad->id_especialidad) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_especialidad" class="form-label">Nombre de la Especialidad:</label>
            <input type="text" name="nombre_especialidad" id="nombre_especialidad" class="form-input" value="{{ $especialidad->nombre_especialidad }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-textarea">{{ $especialidad->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Actualizar</button>
            <a href="{{ route('especialidad.index') }}" class="btn btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
@endsection

