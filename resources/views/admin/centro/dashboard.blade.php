{{-- resources/views/admin/centro/dashboard.blade.php --}}
@extends($layout)

@section('title', 'Panel de Control del Centro Médico')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-lg max-w-3xl w-full">
        <h2 class="text-2xl font-bold text-gray-900">Bienvenido al Panel de Administración del Centro: {{ $centro->nombre }}</h2>
        <p class="mt-2 text-gray-700">Desde aquí, puedes gestionar el personal, usuarios, roles y permisos de tu centro.</p>
    </div>
</div>
@endsection
