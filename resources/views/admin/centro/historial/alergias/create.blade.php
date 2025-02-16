@extends($layout)

@section('title', 'Registrar Nueva Alergia')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #6d28d9, #4f46e5); padding: 20px;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">
                Registrar Nueva Alergia para {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
            </h2>
        </div>
        <form action="{{ route('alergias.store', $paciente->id_paciente) }}" method="POST" style="padding: 20px;">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="tipo" style="display: block; margin-bottom: 5px; font-weight: bold;">Tipo de Alergia</label>
                <input type="text" name="tipo" id="tipo" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="descripcion" style="display: block; margin-bottom: 5px; font-weight: bold;">Descripción</label>
                <textarea name="descripcion" id="descripcion" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; resize: none; height: 100px;"></textarea>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="severidad" style="display: block; margin-bottom: 5px; font-weight: bold;">Severidad</label>
                <select name="severidad" id="severidad" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
                    <option value="leve">Leve</option>
                    <option value="moderada">Moderada</option>
                    <option value="severa">Severa</option>
                </select>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background-color: #10b981; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                    Registrar
                </button>
                <a href="{{ route('alergias.index') }}" style="padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

