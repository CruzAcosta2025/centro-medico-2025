@extends($layout)

@section('title', 'Gestión de Facturas')

@section('content')
    <div style="max-width: 1200px; margin: 20px auto;">
        <h2 style="text-align: center; color: #004643; margin-bottom: 20px;">Listado de Facturas</h2>

        <!-- Buscador -->
        <form action="{{ route('caja.index') }}" method="GET" style="margin-bottom: 20px;">
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <input type="text" name="dni" value="{{ request('dni') }}" placeholder="Buscar por DNI"
                    style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px; min-width: 200px;">
                <button type="submit"
                    style="background: #004643; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; min-width: 120px;">
                    Buscar
                </button>
            </div>
        </form>

        @if ($dni && !$paciente)
            <p style="text-align: center; color: #e63946; margin-bottom: 20px;">
                El paciente con DNI <strong>{{ $dni }}</strong> no se encuentra registrado.
            </p>
        @endif


        @if ($paciente)
            <!-- Información del Paciente -->
            <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 8px;">
                <p><strong>Paciente Encontrado:</strong></p>
                <p><strong>Nombre:</strong> {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</p>
                <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
                <div style="margin-top: 20px;">
                    <a href="{{ route('caja.crearFactura', ['id_paciente' => $paciente->id_paciente]) }}"
                        style="background: #006d62; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                        Crear Nueva Factura
                    </a>
                </div>
            </div>
        @endif

        <!-- Botón para generar factura general -->
        <form id="form-generar-factura-general" action="{{ route('caja.generarFacturaGeneral') }}" method="POST">
            @csrf
            <input type="hidden" name="facturas" value="" id="facturas-hidden">
            <button id="btn-generar-factura-general" type="submit" disabled
                style="background: #006d62; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">
                Generar Factura General
            </button>
        </form>

        <!-- Tabla de Facturas -->
        @if ($facturas->isNotEmpty())
            <div style="overflow-x: auto; position: relative; margin-top: 20px;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 14px;">
                    <thead>
                        <tr style="background: #004643; color: #fff;">
                            <th style="padding: 15px; text-align: left; min-width: 50px;">#</th>
                            <th style="padding: 15px; text-align: left; min-width: 150px;">Fecha</th>
                            <th style="padding: 15px; text-align: left; min-width: 150px;">Paciente</th>
                            <th style="padding: 15px; text-align: left; min-width: 100px;">DNI</th>
                            <th style="padding: 15px; text-align: left; min-width: 150px;">Personal Médico</th>
                            <th style="padding: 15px; text-align: left; min-width: 200px;">Servicio</th>
                            <th style="padding: 15px; text-align: left; min-width: 150px;">Método de Pago</th>
                            <th style="padding: 15px; text-align: center; min-width: 120px;">Estado</th>
                            <th style="padding: 15px; text-align: right; min-width: 100px;">Subtotal</th>
                            <th style="padding: 15px; text-align: right; min-width: 100px;">Impuesto</th>
                            <th style="padding: 15px; text-align: right; min-width: 100px;">Total</th>
                            <th
                                style="padding: 15px; text-align: center; position: sticky; right: 0; background: #004643; z-index: 2;">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                            <tr style="border-bottom: 1px solid #ccc;">
                                <td style="padding: 15px; text-align: center;">
                                    <input type="checkbox" class="factura-checkbox" name="facturas[]"
                                        value="{{ $factura->id_factura }}" data-paciente="{{ $factura->id_paciente }}"
                                        style="transform: scale(1.2);">
                                </td>
                                <td style="padding: 15px;">{{ $factura->fecha_factura }}</td>
                                <td style="padding: 15px;">{{ $factura->paciente->primer_nombre }}
                                    {{ $factura->paciente->primer_apellido }}</td>
                                <td style="padding: 15px;">{{ $factura->paciente->dni }}</td>
                                <td style="padding: 15px;">{{ $factura->personalMedico->usuario->nombre ?? 'N/A' }}</td>
                                <td style="padding: 15px;">
                                    @if ($factura->servicios->isNotEmpty())
                                        <span>{{ $factura->servicios->first()->servicio->nombre_servicio }}</span>
                                    @else
                                        <span>No asignado</span>
                                    @endif
                                </td>
                                <td style="padding: 15px;">
                                    {{ ucfirst(strtolower($factura->metodo_pago ?? 'No definido')) }}
                                </td>
                                <td style="padding: 15px; text-align: center;">
                                    {{ ucfirst(strtolower($factura->estado_pago)) }}</td>
                                <td style="padding: 15px; text-align: right;">S/ {{ number_format($factura->subtotal, 2) }}
                                </td>
                                <td style="padding: 15px; text-align: right;">S/ {{ number_format($factura->impuesto, 2) }}
                                </td>
                                <td style="padding: 15px; text-align: right;">S/ {{ number_format($factura->total, 2) }}
                                </td>
                                <td
                                    style="padding: 15px; text-align: center; position: sticky; right: 0; background: #fff; z-index: 1;">
                                    <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                                        <a href="{{ route('caja.verFactura', $factura->id_factura) }}"
                                            style="background: #1d72b8; color: #fff; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                            Ver
                                        </a>

                                        <a href="{{ route('caja.editarFactura', $factura->id_factura) }}"
                                            style="background: #f9bc60; color: #001e1d; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                            Editar
                                        </a>
                                        <form action="{{ route('caja.eliminarFactura', $factura->id_factura) }}"
                                            method="POST" onsubmit="return confirmacionEliminar(event)"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="background: #e63946; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; font-size: 12px;">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p style="text-align: center; color: #e63946;">No se encontraron facturas para mostrar.</p>
        @endif

        <!-- Paginación -->
        <div style="margin-top: 20px; text-align: center;">
            {{ $facturas->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.factura-checkbox');
            const btnGenerar = document.getElementById('btn-generar-factura-general');
            const facturasHiddenInput = document.getElementById('facturas-hidden');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selected = Array.from(checkboxes).filter(cb => cb.checked);
                    const pacientes = [...new Set(selected.map(cb => cb.dataset.paciente))];

                    if (pacientes.length > 1) {
                        alert('Solo puedes seleccionar facturas del mismo paciente.');
                        checkbox.checked = false;
                    }

                    btnGenerar.disabled = selected.length === 0;

                    // Actualiza el input hidden con las facturas seleccionadas
                    facturasHiddenInput.value = selected.map(cb => cb.value).join(',');
                });
            });
        });

        function confirmacionEliminar(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta factura?')) {
                event.preventDefault();
                return false;
            }
        }
    </script>
@endsection
