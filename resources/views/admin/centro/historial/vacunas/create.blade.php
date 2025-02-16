@extends($layout)

@section('title', 'Registrar Nueva Vacuna')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #22c55e, #16a34a); padding: 20px;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">
                Registrar Nueva Vacuna para {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
            </h2>
        </div>
        <form action="{{ route('vacunas.store', $historial->id_historial) }}" method="POST" style="padding: 20px;">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="nombre_vacuna" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre de la Vacuna</label>
                <input type="text" name="nombre_vacuna" id="nombre_vacuna" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="fecha_aplicacion" style="display: block; margin-bottom: 5px; font-weight: bold;">Fecha de Aplicación</label>
                <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="dosis" style="display: block; margin-bottom: 5px; font-weight: bold;">Dosis</label>
                <input type="text" name="dosis" id="dosis" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="proxima_dosis" style="display: block; margin-bottom: 5px; font-weight: bold;">Próxima Dosis</label>
                <input type="date" name="proxima_dosis" id="proxima_dosis" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="observaciones" style="display: block; margin-bottom: 5px; font-weight: bold;">Observaciones</label>
                <textarea name="observaciones" id="observaciones" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; resize: none; height: 100px;"></textarea>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background-color: #22c55e; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                    Registrar
                </button>
                <a href="{{ route('vacunas.index', ['dni' => $paciente->dni]) }}" style="padding: 10px 20px; background-color: #6b7280; color: #ffffff; text-decoration: none; border-radius: 4px;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
