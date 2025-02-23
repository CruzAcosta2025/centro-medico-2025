@extends($layout)

@section('title', 'Servicios')

@section('content')
<div style="max-width: 800px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px;">
    <h2 style="text-align: center; color: #004643;">Listado de Servicios</h2>

    <!-- Botón para crear un nuevo servicio -->
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="{{ route('servicios.create') }}"
            style="background: #004643; color: #fff; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
            Crear Servicio
        </a>
    </div>

    <!-- Tabla de Servicios -->
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background: #f0f2f5;">
                <th style="text-align: left;min-width: 150px; padding: 10px; border-bottom: 2px solid #ccc;">Nombre</th>
                <th style="text-align: left;min-width: 150px; padding: 10px; border-bottom: 2px solid #ccc;">Categoría</th>
                <th style="text-align: left;min-width: 150px; padding: 10px; border-bottom: 2px solid #ccc;">Precio</th>
                <th style="text-align: left;min-width: 150px; padding: 10px; border-bottom: 2px solid #ccc;">Estado</th>
                <th style="text-align: left;min-width: 150px; padding: 10px; border-bottom: 2px solid #ccc;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($servicios as $servicio)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $servicio->nombre_servicio }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $servicio->categoria_servicio }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">S/ {{ number_format($servicio->precio, 2) }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ ucfirst($servicio->estado) }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">
                    <a href="{{ route('servicios.edit', $servicio->id_servicio) }}"
                        style="color: #004643; text-decoration: none; margin-right: 10px;">
                        Editar
                    </a>
                    <form action="{{ route('servicios.destroy', $servicio->id_servicio) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background: transparent; color: red; border: none; cursor: pointer;"
                            onclick="return confirm('¿Está seguro de eliminar este servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 10px; text-align: center;">No hay servicios registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div style="text-align: center;">
        {{ $servicios->links() }}
    </div>
</div>
@endsection