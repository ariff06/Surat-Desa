<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-md flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">

    <div class="hidden md:block px-6 py-5 border-b">
        <h1 class="text-lg font-bold text-gray-800">Panel : Admin Desa</h1>
    </div>

    <div class="md:hidden h-16"></div>

    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }} font-medium text-sm transition">
            🏠 Dashboard
        </a>
        <a href="{{ route('admin.permohonan.index') }}"
            class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('admin.permohonan.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }} font-medium text-sm transition">
            📋 Daftar Permohonan
        </a>
        <a href="{{ route('admin.rt.management.index') }}"
            class="flex items-center gap-3 px-4 py-2 rounded-lg {{ request()->routeIs('admin.rt.management.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }} font-medium text-sm transition">
            👥 Management RT
        </a>

        <div class="border-t border-gray-100 pt-4 mt-2">
            <a href="{{ route('permohonan.dashboard') }}" target="_blank"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-500 hover:bg-gray-50 font-medium text-sm transition">
                🌐 Lihat Halaman Publik
            </a>
        </div>
    </nav>

    <div class="px-4 py-4 border-t">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition text-sm">
                Keluar
            </button>
        </form>
    </div>
</aside>