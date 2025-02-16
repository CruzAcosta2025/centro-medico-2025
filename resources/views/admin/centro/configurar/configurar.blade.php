@extends($layout)

@section('title', 'Configurar Centro Médico')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="text-align: center; color: {{ $centroMedico->color_tema ?? '#004643' }};">Configurar Centro Médico</h2>

    @if (session('success'))
        <p style="color: green; text-align: center;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('configurar.centro.update') }}" method="POST" enctype="multipart/form-data"
        style="background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="nombre">Nombre del Centro Médico</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $centroMedico->nombre) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('nombre') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $centroMedico->direccion) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('direccion') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="ruc">RUC</label>
            <input type="text" name="ruc" id="ruc" value="{{ old('ruc', $centroMedico->ruc) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('ruc') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="color_tema">Color del Tema</label>
            <input type="color" name="color_tema" id="color_tema" value="{{ old('color_tema', $centroMedico->color_tema) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('color_tema') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($centroMedico->logo)
                <p>Logo Actual:</p>
                <img src="{{ asset('storage/' . $centroMedico->logo) }}" alt="Logo Centro Médico" style="max-width: 100px; height: auto;">
            @endif
            @error('logo') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background: #006d62; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
