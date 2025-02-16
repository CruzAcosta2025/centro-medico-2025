@extends($layout)

@section('title', 'Editar Alergia')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #ed8936, #ed64a6); padding: 20px;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">Editar Alergia</h2>
        </div>
        <form action="{{ route('alergias.update', [$paciente->id_paciente, $alergia->id_alergia]) }}" method="POST" style="padding: 20px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 20px;">
                <label for="tipo" style="display: block; margin-bottom: 5px; font-weight: bold; color: #4a5568;">Tipo</label>
                <input type="text" name="tipo" id="tipo" value="{{ $alergia->tipo }}" required
                       style="width: 100%; padding: 8px; border: 1px solid #e2e8f0; border-radius: 4px; background-color: #edf2f7;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="descripcion" style="display: block; margin-bottom: 5px; font-weight: bold; color: #4a5568;">Descripción</label>
                <textarea name="descripcion" id="descripcion"
                          style="width: 100%; padding: 8px; border: 1px solid #e2e8f0; border-radius: 4px; background-color: #edf2f7; resize: none; min-height: 100px;">{{ $alergia->descripcion }}</textarea>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="severidad" style="display: block; margin-bottom: 5px; font-weight: bold; color: #4a5568;">Severidad</label>
                <select name="severidad" id="severidad" required
                        style="width: 100%; padding: 8px; border: 1px solid #e2e8f0; border-radius: 4px; background-color: #edf2f7;">
                    <option value="leve" {{ $alergia->severidad == 'leve' ? 'selected' : '' }}>Leve</option>
                    <option value="moderada" {{ $alergia->severidad == 'moderada' ? 'selected' : '' }}>Moderada</option>
                    <option value="severa" {{ $alergia->severidad == 'severa' ? 'selected' : '' }}>Severa</option>
                </select>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background-color: #48bb78; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">
                    Actualizar
                </button>
                <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                   style="padding: 10px 20px; background-color: #718096; color: #ffffff; text-decoration: none; border-radius: 4px; transition: background-color 0.3s;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

