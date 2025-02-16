@extends($layout)
@section('title', 'Vista Previa de Factura')

@section('content')
    <div
        style="max-width: 800px; margin: auto; padding: 20px; background: #fff; border: 1px solid #ddd; border-radius: 8px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <!-- Logo del centro médico con ajuste de tamaño -->
            @if (Auth::user()->centroMedico->logo)
                <img src="{{ asset('storage/' . Auth::user()->centroMedico->logo) }}" alt="Logo Centro Médico"
                    style="max-height: 300px; max-width: 300px; margin-bottom: 20px;">
            @endif
            <!-- Información del centro médico -->
            <h2>{{ Auth::user()->centroMedico->nombre ?? 'Centro Médico' }}</h2>
            <p><strong>RUC:</strong> {{ Auth::user()->centroMedico->ruc ?? 'N/A' }}</p>
            <p><strong>Dirección:</strong> {{ Auth::user()->centroMedico->direccion ?? 'N/A' }}</p>
        </div>

        <!-- Detalles de la factura -->
        <h3 style="text-align: center;">Factura #{{ $factura->id_factura }}</h3>

        <div style="margin-bottom: 20px;">
            <p><strong>Paciente:</strong> {{ $factura->paciente->primer_nombre }} {{ $factura->paciente->primer_apellido }}
            </p>
            <p><strong>DNI:</strong> {{ $factura->paciente->dni }}</p>
            <p><strong>Fecha:</strong> {{ $factura->fecha_factura }}</p>
            <p><strong>Atendido por:</strong> {{ $factura->personalMedico->usuario->nombre ?? 'Sin asignar' }}</p>
        </div>

        <!-- Tabla de servicios -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background: #004643; color: #fff;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Servicio</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: right;">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factura->servicios as $servicio)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $servicio->servicio->nombre_servicio }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">S/
                            {{ number_format($servicio->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Subtotal:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">S/
                        {{ number_format($factura->subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Impuesto (18%):</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">S/
                        {{ number_format($factura->impuesto, 2) }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Total:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">S/
                        {{ number_format($factura->total, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Formulario para cambiar tamaño de hoja -->
        <form action="{{ route('caja.verFactura', ['id' => $factura->id_factura]) }}" method="GET"
            style="margin-bottom: 20px;">
            <label for="tamaño">Seleccionar tamaño de hoja:</label>
            <select name="tamaño" id="tamaño" onchange="this.form.submit()">
                <option value="A4" {{ $tamaño === 'A4' ? 'selected' : '' }}>A4</option>
                <option value="A5" {{ $tamaño === 'A5' ? 'selected' : '' }}>A5</option>
                <option value="Ticket" {{ $tamaño === 'Ticket' ? 'selected' : '' }}>Ticket</option>
            </select>
        </form>

        <!-- Visor de PDF embebido -->
        <iframe src="data:application/pdf;base64,{{ $pdfBase64 }}"
            style="width: 100%; height: 600px; border: none;"></iframe>
    </div>
@endsection
