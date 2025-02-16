@extends($layout)

@section('title', 'Gestión de Usuarios del Centro')

@section('content')
<style>
    .users-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .users-table th,
    .users-table td {
        padding: 0.75rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    .users-table th {
        background: #f3f4f6;
        font-weight: bold;
    }
    .users-table tr:hover {
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
        .users-table th, .users-table td {
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
    <h2 class="text-xl font-bold">Gestión de Usuarios del Centro</h2>
    <a href="{{ route('usuarios-centro.create') }}" class="btn">Crear Nuevo Usuario</a>
</div>

<div class="table-container">
    <table class="users-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol->nombre_rol }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('usuarios-centro.edit', $usuario->id_usuario) }}" class="btn">Editar</a>
                            <form action="{{ route('usuarios-centro.destroy', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete"disabled>Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
