@extends($layout)

@section('title', 'Registrar Solicitud de Sangre')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 20px;">
    <h2 style="text-align: center; margin-bottom: 20px; color: #004643;">Registrar Solicitud de Sangre</h2>

    <form action="{{ route('sangre.solicitudes.store') }}" method="POST" id="solicitud-form">
        @csrf

        <!-- Buscador de DNI -->
        <div style="margin-bottom: 15px;">
            <label for="dni" style="font-weight: bold;">Buscar Paciente por DNI:</label>
            <div style="display: flex; gap: 10px;">
                <input type="text" id="dni" name="dni" placeholder="Ingrese DNI"
                    style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <button type="button" id="buscar-dni" style="padding: 10px; background: #004643; color: #fff; border: none; border-radius: 4px;">Buscar</button>
            </div>
            <span id="paciente-info" style="font-size: 14px; color: #004643;"></span>
            <span id="error-info" style="font-size: 14px; color: red;"></span>
        </div>

        <!-- Paciente ID -->
        <input type="hidden" id="id_paciente" name="id_paciente">

        <!-- Tipo de Sangre -->
        <div style="margin-bottom: 15px;">
            <label for="tipo_sangre" style="font-weight: bold;">Tipo de Sangre:</label>
            <input type="text" id="tipo_sangre" name="tipo_sangre" readonly
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- Cantidad -->
        <div style="margin-bottom: 15px;">
            <label for="cantidad" style="font-weight: bold;">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" max="10" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="fecha_solicitud" style="font-weight: bold;">Fecha de Solicitud:</label>
            <input type="date" id="fecha_solicitud" name="fecha_solicitud" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>


        <!-- Urgencia -->
        <div style="margin-bottom: 15px;">
            <label for="urgencia" style="font-weight: bold;">Nivel de Urgencia:</label>
            <select id="urgencia" name="urgencia" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="BAJA">Baja</option>
                <option value="MEDIA">Media</option>
                <option value="ALTA">Alta</option>
            </select>
        </div>




        <div style="text-align: center;">
            <button type="submit" style="padding: 10px 20px; background: #004643; color: #fff; border: none; border-radius: 4px;">Guardar</button>
            <a href="{{ route('sangre.solicitudes.index') }}" style="padding: 10px 20px; background: #e63946; color: #fff; border: none; border-radius: 4px;">Cancelar</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('buscar-dni').addEventListener('click', function() {
        const dni = document.getElementById('dni').value;

        // Limpiar mensajes previos
        document.getElementById('paciente-info').innerText = '';
        document.getElementById('error-info').innerText = '';

        if (!dni) {
            document.getElementById('error-info').innerText = 'Por favor, ingrese un DNI para buscar.';
            return;
        }

        fetch(`/sangre/buscar-paciente?dni=${dni}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('paciente-info').innerText = `Paciente: ${data.primer_nombre} ${data.primer_apellido}`;
                    document.getElementById('id_paciente').value = data.id_paciente;
                    document.getElementById('tipo_sangre').value = data.grupo_sanguineo;
                } else {
                    document.getElementById('error-info').innerText = 'Paciente no encontrado. Registre al paciente primero.';
                    document.getElementById('id_paciente').value = '';
                    document.getElementById('tipo_sangre').value = '';
                }
            })
            .catch(error => {
                console.error('Error en la búsqueda del DNI:', error);
                document.getElementById('error-info').innerText = 'Hubo un error al buscar el DNI.';
            });
    });
</script>
@endsection