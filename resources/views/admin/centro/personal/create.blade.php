@extends($layout)

@section('title', 'Agregar Personal Médico')

@section('content')
<style>
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
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn-primary {
        background: #0d9488;
        color: #ffffff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background: #0f766e;
    }
</style>

<div class="container">
    <h2>Agregar Personal Médico</h2>
    <form action="{{ route('personal.store', ['id' => $usuario->id_usuario]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_especialidad">Especialidad:</label>
            <select name="id_especialidad" id="id_especialidad" class="form-control" required>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre_especialidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="correo_contacto">Correo de contacto:</label>
            <input type="email" name="correo_contacto" id="correo_contacto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sueldo">Sueldo:</label>
            <input type="number" name="sueldo" id="sueldo" class="form-control" required step="0.01">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_alta">Fecha de Alta:</label>
            <input type="date" name="fecha_alta" id="fecha_alta" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="banco">Banco:</label>
            <input type="text" name="banco" id="banco" class="form-control">
        </div>
        <div class="form-group">
            <label for="numero_cuenta">Número de Cuenta:</label>
            <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control">
        </div>
        <div class="form-group">
            <label for="numero_colegiatura">Número de Colegiatura:</label>
            <input type="text" name="numero_colegiatura" id="numero_colegiatura" class="form-control">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea name="direccion" id="direccion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
