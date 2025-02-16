@extends($layout)

@section('title', 'Editar Donador de Sangre')

@section('content')
<div style="max-width: 700px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px; color: #004643;">Editar Donador</h2>

    <form action="{{ route('sangre.donadores.update', $donador->id_donador) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div style="margin-bottom: 15px;">
            <label for="nombre" style="display: block; font-weight: bold;">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $donador->nombre }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #e9ecef;" readonly>
        </div>

        <!-- Apellido -->
        <div style="margin-bottom: 15px;">
            <label for="apellido" style="display: block; font-weight: bold;">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ $donador->apellido }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #e9ecef;" readonly>
        </div>

        <!-- DNI -->
        <div style="margin-bottom: 15px;">
            <label for="dni" style="display: block; font-weight: bold;">DNI:</label>
            <input type="text" name="dni" id="dni" value="{{ $donador->dni }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #e9ecef;" readonly>
        </div>

        <!-- Tipo de Sangre -->
        <div style="margin-bottom: 15px;">
            <label for="tipo_sangre" style="display: block; font-weight: bold;">Tipo de Sangre:</label>
            @if ($editable)
                <select name="tipo_sangre" id="tipo_sangre" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="A+" {{ $donador->tipo_sangre == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ $donador->tipo_sangre == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ $donador->tipo_sangre == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ $donador->tipo_sangre == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="O+" {{ $donador->tipo_sangre == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ $donador->tipo_sangre == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="AB+" {{ $donador->tipo_sangre == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ $donador->tipo_sangre == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            @else
                <input type="text" value="{{ $donador->tipo_sangre }}"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #e9ecef;" readonly>
            @endif
        </div>

        <!-- Teléfono -->
        <div style="margin-bottom: 15px;">
            <label for="telefono" style="display: block; font-weight: bold;">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="{{ $donador->telefono }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- Estado -->
        <div style="margin-bottom: 15px;">
            <label for="estado" style="display: block; font-weight: bold;">Estado:</label>
            <select name="estado" id="estado" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="POR_EXAMINAR" {{ $donador->estado == 'POR_EXAMINAR' ? 'selected' : '' }}>Por Examinar</option>
                <option value="APTO" {{ $donador->estado == 'APTO' ? 'selected' : '' }}>Apto</option>
                <option value="NO_APTO" {{ $donador->estado == 'NO_APTO' ? 'selected' : '' }}>No Apto</option>
            </select>
        </div>

        <!-- Última Donación -->
        <div style="margin-bottom: 15px;">
            <label for="ultima_donacion" style="display: block; font-weight: bold;">Última Donación (Opcional):</label>
            <input type="date" name="ultima_donacion" id="ultima_donacion" value="{{ $donador->ultima_donacion }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- Botones -->
        <div style="text-align: center;">
            <button type="submit" style="background: #004643; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">
                Guardar
            </button>
            <a href="{{ route('sangre.donadores.index') }}" style="background: #e63946; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
