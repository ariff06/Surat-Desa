<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Surat - Desa Bengle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md min-h-screen flex flex-col">
        <div class="px-6 py-5 border-b">
            <h1 class="text-lg font-bold text-gray-800">Layanan Surat Desa</h1>
            <p class="text-xs text-gray-400 mt-0.5">Desa Bengle, Kec. Majalaya</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
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

    {{-- Konten Utama --}}
    <main class="flex-1 p-8">
        @yield('slot')
    </main>

</body>
</html>