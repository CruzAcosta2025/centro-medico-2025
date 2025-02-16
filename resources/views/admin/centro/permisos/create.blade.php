@extends($layout)

@section('title', 'Crear Nuevo Permiso')

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
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
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
        text-decoration: none;
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

<div class="form-container">
    <h2>Crear Nuevo Permiso</h2>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('permisos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_modulo" class="form-label">Nombre del Módulo:</label>
            <select name="nombre_modulo" id="nombre_modulo" class="form-select" required>
                <option value="">Selecciona un módulo</option>
                @foreach($modulosPermitidos as $modulo)
                    <option value="{{ $modulo }}">{{ $modulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_permiso" class="form-label">Tipo de Permiso:</label>
            <select name="tipo_permiso" id="tipo_permiso" class="form-select" required>
                <option value="">Selecciona un tipo</option>
            </select>
        </div>
        <button type="submit" class="btn">Guardar</button>
        <a href="{{ route('permisos.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('nombre_modulo').addEventListener('change', function () {
        const modulo = this.value;
        const tipoPermisoSelect = document.getElementById('tipo_permiso');

        tipoPermisoSelect.innerHTML = '<option value="">Cargando...</option>';

        fetch(`{{ route('permisos.tipos') }}?nombre_modulo=${modulo}`)
            .then(response => response.json())
            .then(data => {
                tipoPermisoSelect.innerHTML = '<option value="">Selecciona un tipo</option>';
                data.forEach(tipo => {
                    tipoPermisoSelect.innerHTML += `<option value="${tipo}">${tipo.charAt(0).toUpperCase() + tipo.slice(1)}</option>`;
                });
            })
            .catch(() => {
                tipoPermisoSelect.innerHTML = '<option value="">Error al cargar los tipos</option>';
            });
    });
</script>
@endsection
