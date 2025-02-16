@extends($layout)

@section('title', 'Crear Factura')

@section('content')
    <div style="max-width: 900px; margin: auto;">
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
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Datos del Paciente</h3>
                <p><strong>Nombre:</strong> {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</p>
                <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
                <input type="hidden" name="id_paciente" value="{{ $paciente->id_paciente }}">
            </div>

            <!-- Selección de Médico -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Médico Asignado</h3>
                <select name="id_personal_medico"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="" selected disabled>Seleccione un médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->personalMedico->id_personal_medico }}">
                            {{ $medico->personalMedico->usuario->nombre }}
                            ({{ $medico->personalMedico->especialidad->nombre_especialidad }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Servicio -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Servicio</h3>
                <select name="id_servicio" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="" selected disabled>Seleccione un servicio</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id_servicio }}">
                            {{ $servicio->nombre_servicio }} - S/ {{ number_format($servicio->precio, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Método de Pago -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Método de Pago</h3>
                <select name="metodo_pago" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="" selected disabled>Seleccione el método de pago</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="transferencia">Transferencia</option>
                </select>
            </div>

            <!-- Resumen -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Resumen</h3>
                <p><strong>Nota:</strong> El subtotal, impuesto y total se calcularán automáticamente al guardar la factura.</p>
            </div>

            <!-- Botones -->
            <div style="text-align: center;">
                <button type="submit"
                    style="background: #004643; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">Guardar
                    Factura</button>
                <a href="{{ route('caja.index') }}"
                    style="background: #ccc; color: #000; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
