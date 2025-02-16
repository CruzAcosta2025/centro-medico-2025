@extends($layout)

@section('title', 'Crear Nuevo Rol')

@section('content')
<style>
    .form-container {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 600px;
        margin: auto;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-label {
        font-weight: bold;
    }
    .form-select, .form-textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn {
        background: #0d9488;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 1rem;
    }
    .btn:hover {
        background: #0f766e;
    }
    .btn-link {
        color: #0d9488;
        text-decoration: none;
        margin-left: 1rem;
    }
    .btn-link:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <h2 class="text-xl font-bold mb-4">Crear Nuevo Rol</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_rol" class="form-label">Nombre del Rol:</label>
            <select name="nombre_rol" id="nombre_rol" class="form-select" required>
                <option value="">Selecciona un rol</option>
                @foreach($rolesPermitidos as $rol)
                    <option value="{{ $rol }}">{{ $rol }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-textarea"></textarea>
        </div>
        <button type="submit" class="btn">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>
@endsection
