@extends($layout)

@section('title', 'Editar Rol')

@section('content')
<style>
    .card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 600px;
        margin: auto;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #374151;
    }
    .form-select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn {
        background: #0d9488;
        color: #ffffff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 1rem;
    }
    .btn:hover {
        background: #0f766e;
    }
    .btn-link {
        margin-left: 1rem;
        text-decoration: none;
        color: #0d9488;
    }
    .btn-link:hover {
        text-decoration: underline;
    }
</style>

<div class="card">
    <h2 class="text-xl font-bold mb-4">Editar Rol</h2>
    <form action="{{ route('roles.update', $rol->id_rol) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_rol" class="form-label">Nombre del Rol:</label>
            <select name="nombre_rol" id="nombre_rol" class="form-select" required>
                @foreach($rolesPermitidos as $rolPermitido)
                    <option value="{{ $rolPermitido }}" {{ $rol->nombre_rol == $rolPermitido ? 'selected' : '' }}>
                        {{ $rolPermitido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-textarea">{{ $rol->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="{{ route('roles.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>
@endsection
