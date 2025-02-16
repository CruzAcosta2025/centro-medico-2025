@extends($layout)

@section('title', 'Gestión de Roles')

@section('content')
<style>
    .roles-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .roles-table th,
    .roles-table td {
        padding: 0.75rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    .roles-table th {
        background: #f3f4f6;
        font-weight: bold;
    }
    .roles-table tr:hover {
        background: #f9fafb;
    }
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .btn {
        background: #0d9488;
        color: #ffffff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        display: inline-block;
    }
    .btn:hover {
        background: #0f766e;
    }
    .btn-delete {
        background: #ef4444;
    }
    .btn-delete:hover {
        background: #dc2626;
    }
    @media (max-width: 640px) {
        .roles-table th, .roles-table td {
            padding: 0.5rem;
        }
        .header-section {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }
        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="header-section">
    <h2 class="text-xl font-bold">Gestión de Roles</h2>
    <a href="{{ route('roles.create') }}" class="btn">Crear Nuevo Rol</a>
</div>

<div class="table-container">
    <table class="roles-table">
        <thead>
            <tr>
                <th>Nombre del Rol</th>
                <th>Descripción</th>
                <th>Centro Médico</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->nombre_rol }}</td>
                    <td>{{ $rol->descripcion }}</td>
                    <td>{{ $rol->centroMedico->nombre }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('roles.edit', $rol->id_rol) }}" class="btn">Editar</a>
                            <a href="{{ route('roles-permisos.edit', $rol->id_rol) }}" class="btn">Asignar Permisos</a> <!-- Nuevo enlace -->
                            <form action="{{ route('roles.destroy', $rol->id_rol) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este rol?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
