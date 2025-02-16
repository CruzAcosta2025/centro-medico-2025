@extends($layout)

@section('title', 'Asignar Permisos al Rol')

@section('content')
<style>
    .form-group {
        margin-bottom: 1rem;
    }
    .form-label {
        font-weight: bold;
    }
    .checkbox-group {
        margin-bottom: 2rem;
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }
    .checkbox-group h3 {
        margin-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: bold;
    }
    .checkbox-group label {
        display: block;
        margin-bottom: 0.5rem;
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
    <h2>Asignar Permisos al Rol: {{ $rol->nombre_rol }}</h2>
    <form action="{{ route('roles-permisos.update', $rol->id_rol) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach ($permisos as $modulo => $moduloPermisos)
            <div class="checkbox-group">
                <h3>{{ $modulo }}</h3>
                @foreach ($moduloPermisos as $permiso)
                    <label>
                        <input type="checkbox" name="permisos[]" value="{{ $permiso->id_permiso }}"
                        {{ $rol->permisos->contains($permiso->id_permiso) ? 'checked' : '' }}>
                        {{ ucfirst($permiso->tipo_permiso) }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn">Guardar Cambios</button>
        <a href="{{ route('roles.index') }}" class="btn-link">Cancelar</a>
    </form>
</div>
@endsection
