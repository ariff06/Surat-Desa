<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Layanan Surat - Desa Bengle' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Top bar mobile --}}
    <div class="md:hidden bg-white shadow-sm px-4 py-3 flex items-center justify-between sticky top-0 z-50">
        <div>
            <p class="text-sm font-bold text-gray-800">Layanan Surat Desa</p>
            <p class="text-xs text-gray-400">Desa Bengle, Kec. Majalaya</p>
        </div>
        <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Overlay mobile --}}
    <div id="sidebar-overlay" onclick="toggleSidebar()"
        class="hidden fixed inset-0 bg-black bg-opacity-30 z-30 md:hidden">
    </div>

    <div class="flex flex-1">
        <x-sidebar-guest />

        <main class="flex-1 p-4 md:p-8 md:ml-64">
            <div class="max-w-4xl">
                @yield('slot')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>