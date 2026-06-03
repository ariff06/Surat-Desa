<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Surat - Desa Bengle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-100">

    {{-- Top bar mobile --}}
    <div class="md:hidden bg-white shadow-sm px-4 py-3 flex items-center justify-between sticky top-0 z-50">
        <div>
            <p class="text-sm font-bold text-gray-800">Layanan Surat Desa</p>
            <p class="text-xs text-gray-400">Desa Bengle, Kec. Majalaya</p>
        </div>
        <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-gray-100 transition">
            <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Overlay mobile --}}
    <div id="sidebar-overlay" onclick="toggleSidebar()"
        class="hidden fixed inset-0 bg-black bg-opacity-30 z-30 md:hidden">
    </div>

    <div class="flex flex-1">

        {{-- Sidebar --}}
        <aside id="sidebar"
            class="fixed md:static inset-y-0 left-0 z-40 w-64 bg-white shadow-md flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out min-h-screen">

            {{-- Identitas desa -- hanya tampil di desktop --}}
            <div class="hidden md:block px-6 py-5 border-b">
                <h1 class="text-lg font-bold text-gray-800">Layanan Surat Desa</h1>
                <p class="text-xs text-gray-400 mt-0.5">Desa Bengle, Kec. Majalaya</p>
            </div>

            {{-- Spacer mobile biar tidak ketutup topbar --}}
            <div class="md:hidden h-16"></div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <a id="btn-dashboard" href="{{ route('permohonan.dashboard') }}"
                    class="w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 font-medium text-sm transition">
                    🏠 Dashboard
                </a>  

                <button onclick="showForm('tidak_mampu')" id="btn-tidak_mampu"
                    class="w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm">
                    📄 Tidak Mampu
                </button>
                <button onclick="showForm('kematian')" id="btn-kematian"
                    class="w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 font-medium text-sm transition">
                    📋 Kematian
                </button>

                <div class="border-t border-gray-100 pt-4 mt-2">
                    <a href="#" class="w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 font-medium text-sm transition">
                        🔍 Cek Status Surat
                    </a>
                </div>
            </nav>

            <div class="px-6 py-4 border-t">
                <p class="text-xs text-gray-400">Jln. Aswan Krajan I</p>
                <p class="text-xs text-gray-400">Tlp. (0267) &bull; Kode Pos 41355</p>
            </div>
        </aside>

        {{-- Konten utama --}}
        <main class="flex-1 overflow-y-auto">
            <div class="px-4 md:px-8 py-6 max-w-2xl">
                @yield('slot')
            </div>
        </main>

    </div>

    <script>
        // Deteksi halaman aktif untuk highlight sidebar
        const currentPath = window.location.pathname;

        function setActiveSidebar() {
            const btnDashboard = document.getElementById('btn-dashboard');
            const btnTidakMampu = document.getElementById('btn-tidak_mampu');
            const btnKematian = document.getElementById('btn-kematian');

            const activeClass = 'w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm';
            const inactiveClass = 'w-full text-left flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 font-medium text-sm transition';

            if (btnDashboard) btnDashboard.className = inactiveClass;
            if (btnTidakMampu) btnTidakMampu.className = inactiveClass;
            if (btnKematian) btnKematian.className = inactiveClass;

            if (currentPath === '/') {
                if (btnDashboard) btnDashboard.className = activeClass;
            } else if (currentPath.includes('tidak-mampu') || currentPath === '/permohonan') {
                if (btnTidakMampu) btnTidakMampu.className = activeClass;
            } else if (currentPath.includes('kematian')) {
                if (btnKematian) btnKematian.className = activeClass;
            }
        }

        setActiveSidebar();

        function showForm(tipe) {
            window.location.href = tipe === 'tidak_mampu' ? '/permohonan' : '/permohonan/kematian';
        }

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