@extends($layout)

@section('title', 'Crear Examen Médico')

@section('content')
<div class="card">
    <h2 class="text-2xl font-bold mb-6">Registrar Examen Médico</h2>
    <form action="{{ route('examenes.store', $historial->id_historial) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipo_examen" class="block font-bold mb-2">Tipo de Examen:</label>
            <input type="text" id="tipo_examen" name="tipo_examen" class="form-input" required maxlength="100">
        </div>

        <div class="form-group">
            <label for="descripcion" class="block font-bold mb-2">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-input auto-expand" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="resultados" class="block font-bold mb-2">Resultados:</label>
            <textarea id="resultados" name="resultados" class="form-input auto-expand" rows="3"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('examenes.index', $historial->id_historial) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textareas = document.querySelectorAll('.auto-expand');
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
            // Trigger the event on load to adjust initial content
            textarea.dispatchEvent(new Event('input'));
        });
    });
</script>

<style>
    .card {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border-radius: 4px;
        border: 1px solid #d1d5db;
        font-size: 1rem;
        line-height: 1.5;
        transition: border-color 0.15s ease-in-out;
    }
    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .auto-expand {
        min-height: 100px;
        overflow-y: hidden;
        resize: none;
    }
    .form-actions {
        display: flex;
        justify-content: flex-start;
        gap: 1rem;
        margin-top: 2rem;
    }
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 0.15s ease-in-out;
    }
    .btn-primary {
        background-color: #3b82f6;
        color: white;
        border: none;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #2563eb;
    }
    .btn-secondary {
        background-color: #6b7280;
        color: white;
    }
    .btn-secondary:hover {
        background-color: #4b5563;
    }
</style>
@endsection
