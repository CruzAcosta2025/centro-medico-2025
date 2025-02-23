<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Administrador - Centro Médico')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-[#003366] text-white shadow-md p-4 flex flex-wrap justify-between items-center">
        <div class="flex items-center gap-4">
            @if (Auth::user()->centroMedico->logo)
                <img src="{{ asset('storage/' . Auth::user()->centroMedico->logo) }}" alt="Logo Centro Médico" class="h-36 w-auto rounded-md">
            @endif
            <h1 class="text-2xl font-bold text-center w-full sm:w-auto">Panel de {{ Auth::user()->centroMedico->nombre ?? 'Centro Médico' }}</h1>
        </div>
        <nav>
            <ul class="flex flex-wrap justify-center gap-4">
                <li><a href="{{ route('admin.centro.dashboard') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Inicio</a></li>
               <!-- <li><a href="{{ route('configurar.centro') }}" class="px-4 py-2 bg-blue-400 text-gray-800 rounded-md hover:bg-blue-500 transition">Configurar Centro Médico</a></li> -->
                <li><a href="{{ route('roles.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Roles</a></li>
                <!-- <li><a href="{{ route('modulocaja.index') }}" class="px-4 py-2 bg-blue-900 text-white rounded-md hover:bg-blue-800 transition">Gestión de Caja</a></li> -->
                <!-- <li><a href="{{ route('reportes.index') }}" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition">Gestión de Reportes</a></li> -->
                <li><a href="{{ route('permisos.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Permisos</a></li>
                <li><a href="{{ route('usuarios-centro.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Usuarios</a></li>
                <li><a href="{{ route('personal-medico.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Personal Médico</a></li>
                <li><a href="{{ route('trabajadores.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Trabajadores</a></li>
                <li><a href="{{ route('especialidad.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Especialidades</a></li>
                <li><a href="{{ route('horarios.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Horarios</a></li>
                <li><a href="{{ route('turnos.disponibles') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Turnos Disponibles</a></li>
                <li><a href="{{ route('caja.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Facturación</a></li> 
                <li><a href="{{ route('servicios.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Servicios</a></li>
                <li><a href="{{ route('sangre.donadores.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Donadores de Sangre</a></li>
                <li><a href="{{ route('sangre.solicitudes.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Solicitudes de Sangre</a></li>
                <li><a href="{{ route('pacientes.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Pacientes</a></li>
                <li><a href="{{ route('historial.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Historial Clínico</a></li>
                <li><a href="{{ route('alergias.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Alergias</a></li>
                <li><a href="{{ route('diagnosticos.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Diagnósticos</a></li>
                <li><a href="{{ route('vacunas.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Gestión de Vacunas</a></li>
                <li><a href="{{ route('cirugias.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Cirugías</a></li>
                <li><a href="{{ route('recetas.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Recetas y Medicamentos</a></li>
                <!-- <li><a href="{{ route('triajes.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Triajes</a></li> -->
                <li><a href="{{ route('tratamientos.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Tratamientos</a></li>
                <!-- <li><a href="{{ route('archivos.index') }}" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">Archivos Adjuntos</a></li> -->

                <!-- Botón de Cerrar Sesión -->
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="p-6 max-w-screen-xl mx-auto">
        @yield('content')
    </main>

    <script src="{{ asset('js/toggle-files.js') }}" defer></script>
</body>

</html>