@extends($layout)

@section('title', 'Editar Servicio')

@section('content')
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px;">
        <h2 style="text-align: center; color: #004643;">Editar Servicio</h2>

        <form action="{{ route('servicios.update', $servicio->id_servicio) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 15px;">
                <label for="nombre_servicio" style="font-weight: bold;">Nombre del Servicio:</label>
                <input type="text" id="nombre_servicio" name="nombre_servicio" value="{{ $servicio->nombre_servicio }}"
                    style="width: 100%; padding: 10px; border-radius: 4px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="categoria_servicio" style="font-weight: bold;">Categoría:</label>
                <input type="text" id="categoria_servicio" name="categoria_servicio"
                    value="{{ $servicio->categoria_servicio }}" style="width: 100%; padding: 10px; border-radius: 4px;"
                    required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="descripcion" style="font-weight: bold;">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" style="width: 100%; padding: 10px; border-radius: 4px;">{{ $servicio->descripcion }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="precio" style="font-weight: bold;">Precio:</label>
                <input type="number" id="precio" name="precio" value="{{ $servicio->precio }}" step="0.01"
                    style="width: 100%; padding: 10px; border-radius: 4px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="estado" style="font-weight: bold;">Estado:</label>
                <select id="estado" name="estado" style="width: 100%; padding: 10px; border-radius: 4px;">
                    <option value="activo" {{ $servicio->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $servicio->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('servicios.index') }}"
                    style="background: #ccc; color: #000; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">
                    Cancelar
                </a>
                <button type="submit"
                    style="background: #004643; color: #fff; padding: 10px 15px; border: none; border-radius: 5px;">
                    Guardar
                </button>
            </div>

        </form>
    </div>
@endsection
