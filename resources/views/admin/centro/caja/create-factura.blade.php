@extends($layout)

@section('title', 'Crear Factura')

@section('content')
<div style="max-width: 900px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: #004643;">Crear Factura</h2>

    @if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('caja.storeFactura') }}" method="POST">
        @csrf

        <!-- Datos del Paciente -->
        <div style="margin-bottom: 30px;">
            <h3 style="color: #004643; border-bottom: 2px solid #004643; padding-bottom: 5px;">Datos del Paciente</h3>
            <p><strong>Nombre:</strong> {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</p>
            <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
            <input type="hidden" name="id_paciente" value="{{ $paciente->id_paciente }}">
        </div>

        <!-- Selección de Médico -->
        <select name="id_personal_medico"
            style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" required>
            <option value="" selected disabled>Seleccione un médico</option>

            @foreach ($medicos->groupBy('especialidad.nombre_especialidad') as $especialidad => $medicosGrupo)
            <optgroup label="{{ $especialidad ?? 'Sin especialidad' }}">
                @foreach ($medicosGrupo as $medico)
                <option value="{{ $medico->id_personal_medico }}">
                    {{ $medico->usuario->nombre ?? 'Nombre no disponible' }}
                </option>
                @endforeach
            </optgroup>
            @endforeach
        </select>


        <!-- Selección de Servicio -->
        <div style="margin-bottom: 30px;">
            <h3 style="color: #004643; border-bottom: 2px solid #004643; padding-bottom: 5px;">Servicio</h3>
            <select name="id_servicio" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" required>
                <option value="" selected disabled>Seleccione un servicio</option>
                @foreach ($servicios as $servicio)
                <option value="{{ $servicio->id_servicio }}">
                    {{ $servicio->nombre_servicio }} - S/ {{ number_format($servicio->precio, 2) }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Método de Pago -->
        <div style="margin-bottom: 30px;">
            <h3 style="color: #004643; border-bottom: 2px solid #004643; padding-bottom: 5px;">Método de Pago</h3>
            <select name="metodo_pago" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;" required>
                <option value="" selected disabled>Seleccione el método de pago</option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="transferencia">Transferencia</option>
            </select>
        </div>

        <!-- Resumen -->
        <div style="margin-bottom: 30px;">
            <h3 style="color: #004643; border-bottom: 2px solid #004643; padding-bottom: 5px;">Resumen</h3>
            <p><strong>Nota:</strong> El subtotal, impuesto y total se calcularán automáticamente al guardar la factura.</p>
        </div>

        <!-- Botones -->
        <div style="text-align: center;">
            <button type="submit"
                style="background: #004643; color: #fff; padding: 12px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Guardar Factura
            </button>
            <a href="{{ route('caja.index') }}"
                style="background: #ccc; color: #000; padding: 12px 20px; border-radius: 5px; font-size: 16px; text-decoration: none; margin-left: 10px;">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection