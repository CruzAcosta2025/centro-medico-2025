@extends($layout)

@section('title', 'Crear Servicio')

@section('content')
<div style="max-width: 600px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px;">
    <h2 style="text-align: center; color: #004643;">Crear Servicio</h2>

    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nombre_servicio" style="font-weight: bold;">Nombre del Servicio:</label>
            <input type="text" id="nombre_servicio" name="nombre_servicio" value="{{ old('nombre_servicio') }}"
                style="width: 100%; padding: 10px; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="categoria_servicio" style="font-weight: bold;">Categoría:</label>
            <select id="categoria_servicio" name="categoria_servicio" style="width: 100%; padding: 10px; border-radius: 4px;" required>
                <option value="">Seleccione una categoría</option>
                <option value="DIAGNOSTICO" {{ old('categoria_servicio') == 'DIAGNOSTICO' ? 'selected' : '' }}>DIAGNÓSTICO</option>
                <option value="CONSULTA" {{ old('categoria_servicio') == 'CONSULTA' ? 'selected' : '' }}>CONSULTA</option>
                <option value="EXAMEN" {{ old('categoria_servicio') == 'EXAMEN' ? 'selected' : '' }}>EXAMEN</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="descripcion" style="font-weight: bold;">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" style="width: 100%; padding: 10px; border-radius: 4px;">{{ old('descripcion') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="precio" style="font-weight: bold;">Precio:</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio') }}" step="0.01"
                style="width: 100%; padding: 10px; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="estado" style="font-weight: bold;">Estado:</label>
            <select id="estado" name="estado" style="width: 100%; padding: 10px; border-radius: 4px;">
                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
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