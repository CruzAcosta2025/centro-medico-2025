@extends($layout)

@section('title', 'Gestión de Personal Médico')

@section('content')
<style>
    .personal-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .personal-table th,
    .personal-table td {
        padding: 0.75rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    .personal-table th {
        background: #f3f4f6;
        font-weight: bold;
    }
    .personal-table tr:hover {
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
        .personal-table th, .personal-table td {
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
    <h2 class="text-xl font-bold">Gestión de Personal Médico</h2>
    <a href="{{ route('usuarios-centro.create') }}" class="btn">Crear Nuevo Usuario</a>
</div>

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif

<div class="table-container">
    <table class="personal-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Correo</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($personalMedico as $personal)
                <tr>
                    <td>{{ $personal->usuario->nombre ?? 'Sin asignar' }}</td>
                    <td>{{ $personal->especialidad->nombre_especialidad ?? 'N/A' }}</td>
                    <td>{{ $personal->correo_contacto }}</td>
                    <td>{{ $personal->dni }}</td>
                    <td>{{ $personal->telefono }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('personal-medico.edit', $personal->id_personal_medico) }}" class="btn">Editar</a>
                            <form action="{{ route('personal-medico.destroy', $personal->id_personal_medico) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este personal médico?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete"disabled>Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">No hay personal médico registrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
