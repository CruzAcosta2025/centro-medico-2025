@extends($layout)

@section('title', 'Editar Vacuna')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="background: linear-gradient(to right, #ed8936, #f56565); padding: 20px;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">Editar Vacuna</h2>
        </div>
        <form action="{{ route('vacunas.update', [$vacuna->id_historial, $vacuna->id_vacuna]) }}" method="POST" style="padding: 20px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 20px;">
                <label for="nombre_vacuna" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre de Vacuna</label>
                <input type="text" name="nombre_vacuna" id="nombre_vacuna" value="{{ $vacuna->nombre_vacuna }}" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="fecha_aplicacion" style="display: block; margin-bottom: 5px; font-weight: bold;">Fecha de Aplicación</label>
                <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" value="{{ $vacuna->fecha_aplicacion }}" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="dosis" style="display: block; margin-bottom: 5px; font-weight: bold;">Dosis</label>
                <input type="text" name="dosis" id="dosis" value="{{ $vacuna->dosis }}" required style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="proxima_dosis" style="display: block; margin-bottom: 5px; font-weight: bold;">Próxima Dosis</label>
                <input type="date" name="proxima_dosis" id="proxima_dosis" value="{{ $vacuna->proxima_dosis }}" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="observaciones" style="display: block; margin-bottom: 5px; font-weight: bold;">Observaciones</label>
                <textarea name="observaciones" id="observaciones" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; resize: none; height: 100px;">{{ $vacuna->observaciones }}</textarea>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background-color: #f56565; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                    Actualizar
                </button>
                <a href="{{ route('vacunas.index') }}" style="padding: 10px 20px; background-color: #718096; color: #ffffff; text-decoration: none; border-radius: 4px;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
