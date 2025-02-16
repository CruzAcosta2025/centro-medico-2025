<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personal Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 2rem;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 800px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-input,
        .form-select,
        .form-textarea {
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
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
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
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
        .text-danger {
            color: #dc2626;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Personal Médico</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('personal-medico.update', $personal->id_personal_medico) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-input" value="{{ old('nombre', $personal->usuario->nombre) }}" required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_especialidad" class="form-label">Especialidad:</label>
                <select name="id_especialidad" id="id_especialidad" class="form-select">
                    <option value="">Ninguna</option>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id_especialidad }}" {{ old('id_especialidad', $personal->id_especialidad) == $especialidad->id_especialidad ? 'selected' : '' }}>
                            {{ $especialidad->nombre_especialidad }}
                        </option>
                    @endforeach
                </select>
                @error('id_especialidad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-input" value="{{ old('dni', $personal->dni) }}" required>
                @error('dni')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="form-input" value="{{ old('telefono', $personal->telefono) }}">
                @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="correo_contacto" class="form-label">Correo de Contacto:</label>
                <input type="email" name="correo_contacto" id="correo_contacto" class="form-input" value="{{ old('correo_contacto', $personal->correo_contacto) }}" required>
                @error('correo_contacto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="correo_sistema" class="form-label">Correo del Sistema:</label>
                <input type="email" name="correo_sistema" id="correo_sistema" class="form-input" value="{{ old('correo_sistema', $personal->usuario->email) }}" required>
                @error('correo_sistema')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-input">
                <small>Dejar en blanco si no desea cambiar la contraseña</small>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
            </div>
            <div class="form-group">
                <label for="sueldo" class="form-label">Sueldo:</label>
                <input type="number" step="0.01" name="sueldo" id="sueldo" class="form-input" value="{{ old('sueldo', $personal->sueldo) }}" required>
                @error('sueldo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="codigo_postal" class="form-label">Código Postal:</label>
                <input type="text" name="codigo_postal" id="codigo_postal" class="form-input" value="{{ old('codigo_postal', $personal->codigo_postal) }}">
                @error('codigo_postal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="banco" class="form-label">Banco:</label>
                <input type="text" name="banco" id="banco" class="form-input" value="{{ old('banco', $personal->banco) }}">
                @error('banco')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="numero_cuenta" class="form-label">Número de Cuenta:</label>
                <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-input" value="{{ old('numero_cuenta', $personal->numero_cuenta) }}">
                @error('numero_cuenta')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="numero_colegiatura" class="form-label">Número de Colegiatura:</label>
                <input type="text" name="numero_colegiatura" id="numero_colegiatura" class="form-input" value="{{ old('numero_colegiatura', $personal->numero_colegiatura) }}">
                @error('numero_colegiatura')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <textarea name="direccion" id="direccion" class="form-textarea">{{ old('direccion', $personal->direccion) }}</textarea>
                @error('direccion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_rol" class="form-label">Rol:</label>
                <select name="id_rol" id="id_rol" class="form-select" required>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id_rol }}" {{ old('id_rol', $personal->usuario->id_rol) == $rol->id_rol ? 'selected' : '' }}>
                            {{ $rol->nombre_rol }}
                        </option>
                    @endforeach
                </select>
                @error('id_rol')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn">Actualizar</button>
            <a href="{{ route('personal-medico.index') }}" class="btn-link">Cancelar</a>
        </form>
    </div>
</body>
</html>
