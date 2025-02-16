@extends($layout)

@section('title', 'Gestión de Pacientes')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Listado de Pacientes</h2>
    <a href="{{ route('pacientes.create') }}" class="btn mb-4">Agregar Paciente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>DNI</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Grupo Sanguíneo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->primer_apellido }} {{ $paciente->segundo_apellido }}</td>
                    <td>{{ $paciente->dni }}</td>
                    <td>{{ $paciente->fecha_nacimiento }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->grupo_sanguineo }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('pacientes.edit', $paciente->id_paciente) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id_paciente) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este paciente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay pacientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<style>
    .container {
        max-width: 900px;
        margin: 0 auto;
    }
    .btn { padding: 10px 20px; background-color: #0d9488; color: #ffffff; border-radius: 4px; text-decoration: none; }
    .alert { padding: 1rem; background-color: #d1fae5; color: #065f46; margin-bottom: 1rem; }
    .table { width: 100%; border-collapse: collapse; background: white; margin-top: 1rem; }
    .table th, .table td { padding: 0.75rem; border: 1px solid #ddd; }
    .table th { background-color: #f3f4f6; font-weight: bold; }
    .action-buttons { display: flex; gap: 5px; }
    .btn-edit { background-color: #3b82f6; }
    .btn-delete { background-color: #ef4444; }
</style>
