@extends($layout)

@section('title', 'Registrar Cirugía')

@section('content')
<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">
        <h2 style="color: #2d3748; font-size: 24px; margin-bottom: 20px;">Registrar Cirugía</h2>

        <form action="{{ route('cirugias.store', $historial->id_historial) }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="tipo_cirugia" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Tipo de Cirugía</label>
                <input type="text" name="tipo_cirugia" id="tipo_cirugia" value="{{ old('tipo_cirugia') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="fecha_cirugia" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Fecha de la Cirugía</label>
                <input type="date" name="fecha_cirugia" id="fecha_cirugia" value="{{ old('fecha_cirugia') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="especialidad" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Especialidad</label>
                <select id="especialidad" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                    <option value="">Seleccione una especialidad</option>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre_especialidad }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="cirujano" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Cirujano</label>
                <select id="cirujano" name="cirujano" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                    <option value="">Seleccione un cirujano</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="descripcion" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                    style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">{{ old('descripcion') }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="complicaciones" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Complicaciones</label>
                <textarea name="complicaciones" id="complicaciones" rows="3"
                    style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">{{ old('complicaciones') }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="notas_postoperatorias" style="font-weight: 600; color: #2d3748; display: block; margin-bottom: 8px;">Notas Postoperatorias</label>
                <textarea name="notas_postoperatorias" id="notas_postoperatorias" rows="3"
                    style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">{{ old('notas_postoperatorias') }}</textarea>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <button type="submit"
                    style="padding: 10px 20px; background-color: #3b82f6; color: #ffffff; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">
                    Guardar
                </button>

                <a href="{{ route('cirugias.index', ['dni' => $paciente->dni]) }}"
                    style="padding: 10px 20px; background-color: #6b7280; color: #ffffff; border-radius: 4px; text-decoration: none; font-weight: 600;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const especialidadSelect = document.getElementById('especialidad');
        const cirujanoSelect = document.getElementById('cirujano');

        especialidadSelect.addEventListener('change', function () {
            const especialidadId = this.value;

            if (!especialidadId) {
                cirujanoSelect.innerHTML = '<option value="">Seleccione un cirujano</option>';
                return;
            }

            fetch(`/personal-medico/por-especialidad/${especialidadId}`)
                .then(response => response.json())
                .then(data => {
                    cirujanoSelect.innerHTML = '<option value="">Seleccione un cirujano</option>';
                    data.forEach(personal => {
                        cirujanoSelect.innerHTML += `
                            <option value="${personal.usuario.nombre}">${personal.usuario.nombre}</option>
                        `;
                    });
                })
                .catch(error => {
                    console.error('Error al cargar personal médico:', error);
                });
        });
    });
</script>
@endsection
