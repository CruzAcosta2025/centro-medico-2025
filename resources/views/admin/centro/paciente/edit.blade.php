@extends($layout)

@section('title', 'Editar Paciente')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Editar Paciente</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pacientes.update', $paciente->id_paciente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" value="{{ old('dni', $paciente->dni) }}" readonly>
        </div>
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre</label>
            <input type="text" name="primer_nombre" id="primer_nombre" value="{{ old('primer_nombre', $paciente->primer_nombre) }}" readonly>
        </div>
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" id="segundo_nombre" value="{{ old('segundo_nombre', $paciente->segundo_nombre) }}" readonly>
        </div>
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido', $paciente->primer_apellido) }}" readonly>
        </div>
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido', $paciente->segundo_apellido) }}" readonly>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" id="genero" required>
                <option value="Masculino" {{ old('genero', $paciente->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero', $paciente->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" rows="2" required>{{ old('direccion', $paciente->direccion) }}</textarea>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $paciente->telefono) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $paciente->email) }}">
        </div>
        <div class="form-group">
            <label for="grupo_sanguineo">Grupo Sanguíneo</label>
            <select name="grupo_sanguineo" id="grupo_sanguineo" required>
                @foreach(['O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'] as $grupo)
                    <option value="{{ $grupo }}" {{ old('grupo_sanguineo', $paciente->grupo_sanguineo) == $grupo ? 'selected' : '' }}>{{ $grupo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_contacto_emergencia">Contacto de Emergencia</label>
            <input type="text" name="nombre_contacto_emergencia" id="nombre_contacto_emergencia" value="{{ old('nombre_contacto_emergencia', $paciente->nombre_contacto_emergencia) }}">
        </div>
        <div class="form-group">
            <label for="telefono_contacto_emergencia">Teléfono de Emergencia</label>
            <input type="text" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia" value="{{ old('telefono_contacto_emergencia', $paciente->telefono_contacto_emergencia) }}">
        </div>
        <div class="form-group">
            <label for="relacion_contacto_emergencia">Relación de Emergencia</label>
            <input type="text" name="relacion_contacto_emergencia" id="relacion_contacto_emergencia" value="{{ old('relacion_contacto_emergencia', $paciente->relacion_contacto_emergencia) }}">
        </div>
        <div class="form-group">
            <label for="es_donador">¿Es donador de sangre?</label>
            <select name="es_donador" id="es_donador" required>
                <option value="SI" {{ old('es_donador', $paciente->es_donador) == 'SI' ? 'selected' : '' }}>Sí</option>
                <option value="NO" {{ old('es_donador', $paciente->es_donador) == 'NO' ? 'selected' : '' }}>No</option>
                <option value="POR_EXAMINAR" {{ old('es_donador', $paciente->es_donador) == 'POR_EXAMINAR' ? 'selected' : '' }}>Por Examinar</option>
            </select>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-cancel">Cancelar</a>
    </form>
</div>
@endsection

<style>
    .container { max-width: 600px; margin: 0 auto; }
    .form-group { margin-bottom: 15px; }
    label { display: block; font-weight: bold; }
    input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
    input[readonly] { background-color: #f5f5f5; cursor: not-allowed; }
    .btn, .btn-cancel {
        display: inline-block;
        padding: 10px 20px;
        color: #ffffff;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }
    .btn { background-color: #0d9488; }
    .btn:hover { background-color: #0f766e; }
    .btn-cancel { background-color: #6b7280; }
    .alert-danger { background-color: #fee2e2; border: 1px solid #f87171; color: #b91c1c; padding: 10px; margin-bottom: 20px; border-radius: 4px; }
</style>
