@extends($layout)

@section('title', 'Editar Factura')

@section('content')
    <div style="max-width: 900px; margin: auto;">
        <h2 style="text-align: center; color: #004643;">Editar Factura</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('caja.actualizarFactura', $factura->id_factura) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Datos del Paciente -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Datos del Paciente</h3>
                <p><strong>Nombre:</strong> {{ $factura->paciente->primer_nombre }} {{ $factura->paciente->primer_apellido }}</p>
                <p><strong>DNI:</strong> {{ $factura->paciente->dni }}</p>
            </div>

            <!-- Selección de Médico -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Médico Asignado</h3>
                <select name="id_personal_medico"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->personalMedico->id_personal_medico }}"
                            @if ($factura->id_personal_medico == $medico->personalMedico->id_personal_medico) selected @endif>
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
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id_servicio }}"
                            @if ($factura->servicios->first()->id_servicio == $servicio->id_servicio) selected @endif>
                            {{ $servicio->nombre_servicio }} - S/ {{ number_format($servicio->precio, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Método de Pago -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Método de Pago</h3>
                <select name="metodo_pago" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="efectivo" @if ($factura->metodo_pago == 'efectivo') selected @endif>Efectivo</option>
                    <option value="tarjeta" @if ($factura->metodo_pago == 'tarjeta') selected @endif>Tarjeta</option>
                    <option value="transferencia" @if ($factura->metodo_pago == 'transferencia') selected @endif>Transferencia</option>
                </select>
            </div>

            <!-- Estado de Pago -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #004643;">Estado de Pago</h3>
                <select name="estado_pago" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="PENDIENTE" @if ($factura->estado_pago == 'PENDIENTE') selected @endif>Pendiente</option>
                    <option value="PAGADA" @if ($factura->estado_pago == 'PAGADA') selected @endif>Pagada</option>
                    <option value="CANCELADO" @if ($factura->estado_pago == 'CANCELADO') selected @endif>Cancelada</option>
                </select>
            </div>

            <!-- Botones -->
            <div style="text-align: center;">
                <button type="submit"
                    style="background: #004643; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">Guardar
                    Cambios</button>
                <a href="{{ route('caja.index') }}"
                    style="background: #ccc; color: #000; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
