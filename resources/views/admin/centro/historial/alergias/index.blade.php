@extends($layout)

@section('title', 'Listado de Alergias')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div style="background: linear-gradient(to right, #3498db, #2980b9); padding: 20px; display: flex; justify-content: space-between; align-items: center;">
            <h2 style="color: #ffffff; font-size: 24px; margin: 0;">Listado de Alergias</h2>
            @if ($paciente)
                <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                   style="padding: 10px 15px; background-color: #ecf0f1; color: #2c3e50; text-decoration: none; border-radius: 4px; font-size: 14px;">
                    Regresar a Historial
                </a>
            @endif
        </div>

        <div style="padding: 20px;">
            <!-- Buscador DNI -->
            <div style="margin-bottom: 20px;">
                <form method="GET" action="{{ route('alergias.index') }}" style="display: flex; gap: 10px; max-width: 400px;">
                    <input type="text"
                           name="dni"
                           placeholder="Ingrese DNI"
                           value="{{ $dni }}"
                           style="flex-grow: 1; padding: 10px; border: 1px solid #bdc3c7; border-radius: 4px;">
                    <button type="submit" style="padding: 10px 20px; background-color: #3498db; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">
                        Buscar
                    </button>
                </form>
            </div>

            @if ($paciente)
                <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <p style="margin: 0; font-size: 16px;">
                        <strong>Paciente:</strong>
                        {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}
                    </p>
                    <a href="{{ route('alergias.create', $paciente->id_paciente) }}"
                       style="padding: 10px 20px; background-color: #2ecc71; color: #ffffff; text-decoration: none; border-radius: 4px; font-size: 14px;">
                        Nueva Alergia
                    </a>
                </div>

                @if ($alergias->isEmpty())
                    <div style="background-color: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                        No hay alergias registradas.
                    </div>
                @else
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr style="background-color: #f8f9fa;">
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Tipo</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Descripción</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Severidad</th>
                                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alergias as $alergia)
                                    <tr>
                                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ $alergia->tipo }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ $alergia->descripcion }}</td>
                                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                                            <span style="padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold;
                                                {{ $alergia->severidad === 'Alta' ? 'background-color: #e74c3c; color: #ffffff;' :
                                                   ($alergia->severidad === 'Media' ? 'background-color: #f39c12; color: #ffffff;' :
                                                    'background-color: #2ecc71; color: #ffffff;') }}">
                                                {{ $alergia->severidad }}
                                            </span>
                                        </td>
                                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                                            <div style="display: flex; gap: 5px;">
                                                <a href="{{ route('alergias.edit', [$paciente->id_paciente, $alergia->id_alergia]) }}"
                                                   style="padding: 5px 10px; background-color: #f39c12; color: #ffffff; text-decoration: none; border-radius: 4px; font-size: 12px;">
                                                    Editar
                                                </a>
                                                <form action="{{ route('alergias.destroy', [$paciente->id_paciente, $alergia->id_alergia]) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Confirma eliminar esta alergia?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="padding: 5px 10px; background-color: #e74c3c; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
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
                @endif
            @else
                <div style="background-color: #fff3cd; color: #856404; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                    No se encontró ningún paciente con el DNI ingresado.
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin-bottom: 15px;
        }

        td {
            border: none;
            position: relative;
            padding-left: 50% !important;
        }

        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            content: attr(data-label);
            font-weight: bold;
        }
    }
</style>
@endsection

