@extends($layout)

@section('title', 'Agregar Paciente')

@section('content')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Agregar Paciente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Campo para buscar DNI -->
        <div class="form-group">
            <label for="buscar_dni">DNI</label>
            <div style="display: flex; gap: 10px;">
                <input type="text" name="buscar_dni" id="buscar_dni" maxlength="8" placeholder="Ingrese DNI a buscar" required>
                <button type="button" id="buscar-dni"
                    style="padding: 5px 10px; background-color: #0d9488; color: white;">Buscar DNI</button>
            </div>
        </div>

        <!-- Formulario de creación -->
        <form action="{{ route('pacientes.store') }}" method="POST" id="form-paciente">
            @csrf
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" id="dni" value="{{ old('dni') }}" readonly required>
            </div>
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre</label>
                <input type="text" name="primer_nombre" id="primer_nombre" value="{{ old('primer_nombre') }}" readonly required>
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre</label>
                <input type="text" name="segundo_nombre" id="segundo_nombre" value="{{ old('segundo_nombre') }}" readonly>
            </div>
            <div class="form-group">
                <label for="primer_apellido">Primer Apellido</label>
                <input type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido') }}" readonly required>
            </div>
            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido</label>
                <input type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido') }}" readonly>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select name="genero" id="genero" required>
                    <option value="" disabled selected>Selecciona un género</option>
                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea name="direccion" id="direccion" rows="2" required>{{ old('direccion') }}</textarea>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="grupo_sanguineo">Grupo Sanguíneo</label>
                <select name="grupo_sanguineo" id="grupo_sanguineo" required>
                    <option value="" disabled selected>Selecciona un grupo sanguíneo</option>
                    <option value="O-" {{ old('grupo_sanguineo') == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="O+" {{ old('grupo_sanguineo') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="A-" {{ old('grupo_sanguineo') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="A+" {{ old('grupo_sanguineo') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="B-" {{ old('grupo_sanguineo') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="B+" {{ old('grupo_sanguineo') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="AB-" {{ old('grupo_sanguineo') == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="AB+" {{ old('grupo_sanguineo') == 'AB+' ? 'selected' : '' }}>AB+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="es_donador">¿Es donador de sangre?</label>
                <select name="es_donador" id="es_donador" required>
                    <option value="SI" {{ old('es_donador') == 'SI' ? 'selected' : '' }}>Sí</option>
                    <option value="NO" {{ old('es_donador') == 'NO' ? 'selected' : '' }}>No</option>
                    <option value="POR_EXAMINAR" {{ old('es_donador') == 'POR_EXAMINAR' ? 'selected' : '' }}>Por Examinar</option>
                </select>
            </div>
            <!-- Nuevos campos añadidos -->
            <div class="form-group">
                <label for="nombre_contacto_emergencia">Contacto de Emergencia</label>
                <input type="text" name="nombre_contacto_emergencia" id="nombre_contacto_emergencia"
                    value="{{ old('nombre_contacto_emergencia') }}">
            </div>
            <div class="form-group">
                <label for="telefono_contacto_emergencia">Teléfono de Emergencia</label>
                <input type="text" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia"
                    value="{{ old('telefono_contacto_emergencia') }}">
            </div>
            <div class="form-group">
                <label for="relacion_contacto_emergencia">Relación de Emergencia</label>
                <input type="text" name="relacion_contacto_emergencia" id="relacion_contacto_emergencia"
                    value="{{ old('relacion_contacto_emergencia') }}">
            </div>

            <button type="submit" class="btn">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-cancel">Cancelar</a>
        </form>

        <!-- Script para buscar y rellenar los campos -->
        <script>
            document.getElementById('buscar-dni').addEventListener('click', async () => {
                const dni = document.getElementById('buscar_dni').value.trim();
                if (!dni) {
                    alert('Por favor, ingresa un DNI.');
                    return;
                }
                const response = await fetch('{{ route("pacientes.buscar.dni") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ dni }),
                });

                if (response.ok) {
                    const data = await response.json();
                    document.getElementById('dni').value = data.dni || '';
                    document.getElementById('primer_nombre').value = data.primer_nombre || '';
                    document.getElementById('segundo_nombre').value = data.segundo_nombre || '';
                    document.getElementById('primer_apellido').value = data.primer_apellido || '';
                    document.getElementById('segundo_apellido').value = data.segundo_apellido || '';

                    // Bloquear campos para evitar modificaciones
                    document.getElementById('dni').setAttribute('readonly', true);
                    document.getElementById('primer_nombre').setAttribute('readonly', true);
                    document.getElementById('segundo_nombre').setAttribute('readonly', true);
                    document.getElementById('primer_apellido').setAttribute('readonly', true);
                    document.getElementById('segundo_apellido').setAttribute('readonly', true);
                } else {
                    alert('DNI no encontrado.');
                }
            });

            // Validar que todos los campos obligatorios estén llenos
            document.getElementById('form-paciente').addEventListener('submit', function (event) {
                const requiredFields = document.querySelectorAll('#form-paciente [required]');
                let valid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.style.border = '1px solid red';
                        valid = false;
                    } else {
                        field.style.border = '1px solid #ddd';
                    }
                });

                if (!valid) {
                    event.preventDefault();
                    alert('Por favor, llena todos los campos obligatorios.');
                }
            });
        </script>
    </div>
@endsection

<!-- Estilos -->
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .btn,
    .btn-cancel {
        display: inline-block;
        padding: 10px 20px;
        color: #ffffff;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn {
        background-color: #0d9488;
    }

    .btn:hover {
        background-color: #0f766e;
    }

    .btn-cancel {
        background-color: #6b7280;
    }

    .alert-danger {
        background-color: #fee2e2;
        border: 1px solid #f87171;
        color: #b91c1c;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
</style>
