@extends($layout)

@section('title', 'Agregar Paciente')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg border-2 border-black">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Agregar Paciente</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Campo para buscar DNI -->
    <div class="mb-4">
        <label for="buscar_dni" class="font-bold">DNI</label>
        <div class="flex gap-2">
            <input type="text" name="buscar_dni" id="buscar_dni" maxlength="8" placeholder="Ingrese DNI a buscar"
                class="flex-1 p-2 border border-black rounded" required>
            <button type="button" id="buscar-dni"
                class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Buscar DNI</button>
        </div>
    </div>

    <!-- Formulario de creación -->
    <form action="{{ route('pacientes.store') }}" method="POST" id="form-paciente" class="space-y-4">
        @csrf
        <div>
            <label for="dni" class="font-bold">DNI</label>
            <input type="text" name="dni" id="dni" class="w-full p-2 border border-black rounded" readonly required>
        </div>
        <div>
            <label for="primer_nombre" class="font-bold">Primer Nombre</label>
            <input type="text" name="primer_nombre" id="primer_nombre" class="w-full p-2 border border-black rounded" readonly required>
        </div>
        <div>
            <label for="primer_apellido" class="font-bold">Primer Apellido</label>
            <input type="text" name="primer_apellido" id="primer_apellido" class="w-full p-2 border border-black rounded" readonly required>
        </div>
        <div>
            <label for="fecha_nacimiento" class="font-bold">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="w-full p-2 border border-black rounded" required>
        </div>
        <div>
            <label for="telefono" class="font-bold">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="w-full p-2 border border-black rounded" required>
        </div>
        <div>
            <label for="grupo_sanguineo" class="font-bold">Grupo Sanguíneo</label>
            <select name="grupo_sanguineo" id="grupo_sanguineo" class="w-full p-2 border border-black rounded" required>
                <option value="" disabled selected>Selecciona un grupo sanguíneo</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>
        </div>
        <div class="flex justify-center gap-4">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Cancelar</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('buscar-dni').addEventListener('click', async () => {
        const dni = document.getElementById('buscar_dni').value.trim();
        if (!dni) {
            alert('Por favor, ingresa un DNI.');
            return;
        }
        const response = await fetch('{{ route("pacientes.buscar.dni") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ dni }),
        });

        if (response.ok) {
            const data = await response.json();
            document.getElementById('dni').value = data.dni || '';
            document.getElementById('primer_nombre').value = data.primer_nombre || '';
            document.getElementById('primer_apellido').value = data.primer_apellido || '';
        } else {
            alert('DNI no encontrado.');
        }
    });
</script>
@endsection
