<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md min-h-screen flex flex-col">
        <div class="px-6 py-5 border-b">
            <h1 class="text-lg font-bold text-gray-800">Panel : Admin Desa</h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-medium">
                Dashboard
            </a>
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

    {{-- Konten Utama --}}
    <main class="flex-1 p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">Selamat datang, {{ Auth::guard('admin')->user()->name }}</h2>

        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-500">Belum ada permohonan masuk.</p>
        </div>
    </main>

</body>
</html>s