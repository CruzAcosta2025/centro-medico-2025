@extends($layout)

@section('title', 'Crear Usuario')

@section('content')
<div class="container">
    <h2>Crear Usuario</h2>
    <form action="{{ route('usuarios-centro.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="id_rol" class="form-label">Rol:</label>
            <select name="id_rol" id="id_rol" class="form-select" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}">{{ $rol->nombre_rol }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_personal" class="form-label">Tipo de Personal:</label>
            <select name="tipo_personal" id="tipo_personal" class="form-select" required>
                <option value="">Seleccionar tipo de personal</option>
                <option value="medico">Médico</option>
                <option value="no_medico">No Médico</option>
            </select>
        </div>
        <button type="submit" class="btn-primary">Guardar</button>
        <a href="{{ route('usuarios-centro.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>
@endsection
