@extends($layout)

@section('title', 'Editar Usuario')

@section('content')
<style>
    .form-group {
        margin-bottom: 1rem;
    }
    .form-label {
        font-weight: bold;
    }
    .form-input, .form-select {
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
        cursor: pointer;
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

<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('usuarios-centro.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-input" value="{{ $usuario->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-input" value="{{ $usuario->email }}" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Contraseña (Dejar en blanco para no cambiar):</label>
            <input type="password" name="password" id="password" class="form-input">
        </div>
        <div class="form-group">
            <label for="id_rol" class="form-label">Rol:</label>
            <select name="id_rol" id="id_rol" class="form-select" required>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id_rol }}" {{ $usuario->id_rol == $rol->id_rol ? 'selected' : '' }}>
                        {{ $rol->nombre_rol }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="{{ route('usuarios-centro.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>
@endsection
