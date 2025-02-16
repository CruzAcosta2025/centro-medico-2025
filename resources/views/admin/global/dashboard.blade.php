<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Administrador Global</title>
  <!-- Incluir Tailwind CSS desde CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-blue-900 text-white p-4 shadow-md">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between">
      <h1 class="text-2xl font-bold mb-2 sm:mb-0">Panel Administrador Global</h1>
      <nav>
        <ul class="flex flex-col sm:flex-row gap-2 sm:gap-4 list-none">
          <li>
            <a href="{{ route('admin.global.dashboard') }}" class="px-3 py-1 hover:bg-blue-700 rounded">
              Inicio
            </a>
          </li>
          <li>
            <a href="{{ route('centros.index') }}" class="px-3 py-1 hover:bg-blue-700 rounded">
              Gestión de Centros
            </a>
          </li>
          <li>
            <a href="{{ route('usuarios.index') }}" class="px-3 py-1 hover:bg-blue-700 rounded">
              Usuarios
            </a>
          </li>
          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-3 py-1 hover:bg-blue-700 rounded">
              Cerrar sesión
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Contenido principal -->
  <main class="max-w-7xl mx-auto p-6">
    <section class="bg-white p-4 rounded shadow-sm">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Resumen General</h2>
      <p>Bienvenido al panel de administración global. Aquí podrás gestionar los centros médicos y usuarios.</p>
    </section>
  </main>
</body>
</html>
