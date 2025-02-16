@extends($layout)

@section('title', 'Gestión de Permisos')

@section('content')
<style>
    .permissions-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .permissions-table th,
    .permissions-table td {
        padding: 0.75rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    .permissions-table th {
        background: #f3f4f6;
        font-weight: bold;
    }
    .permissions-table tr:hover {
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
        .permissions-table th, .permissions-table td {
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
    <h2 class="text-xl font-bold">Gestión de Permisos</h2>
    <a href="{{ route('permisos.create') }}" class="btn">Crear Nuevo Permiso</a>
</div>

<div class="table-container">
    <table class="permissions-table">
        <thead>
            <tr>
                <th>Nombre del Módulo</th>
                <th>Tipo de Permiso</th>
                <th>Centro Médico</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permisos as $permiso)
                <tr>
                    <td>{{ $permiso->nombre_modulo }}</td>
                    <td>{{ $permiso->tipo_permiso }}</td>
                    <td>{{ $permiso->centroMedico->nombre }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('permisos.edit', $permiso->id_permiso) }}" class="btn">Editar</a>
                            <form action="{{ route('permisos.destroy', $permiso->id_permiso) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este permiso?')">
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
