@extends('layouts.guest')

@section('slot')

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Selamat Datang</h2>
    <p class="text-xs text-gray-400 mt-0.5">Layanan Surat Keterangan Desa Bengle</p>
</div>

{{-- Info cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-5">
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Jenis Layanan</p>
        <p class="text-2xl font-bold text-green-700">2</p>
        <p class="text-sm text-gray-500 mt-1">Surat Tidak Mampu & Kematian</p>
    </div>
    <div class="bg-white rounded-lg shadow p-5">
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Jam Layanan</p>
        <p class="text-2xl font-bold text-green-700">08.00</p>
        <p class="text-sm text-gray-500 mt-1">Senin - Jumat, 08.00 - 15.00 WIB</p>
    </div>
</div>

{{-- Tentang layanan --}}
<div class="bg-white rounded-lg shadow p-6 mb-4">
    <h3 class="text-sm font-semibold text-gray-700 mb-3">Tentang Layanan</h3>
    <p class="text-sm text-gray-500 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Layanan surat keterangan desa ini
        hadir untuk memudahkan warga Desa Bengle dalam mengurus administrasi kependudukan secara
        online tanpa perlu antri di kantor desa.
    </p>
</div>

{{-- Cara pengajuan --}}
<div class="bg-white rounded-lg shadow p-6 mb-4">
    <h3 class="text-sm font-semibold text-gray-700 mb-4">Cara Pengajuan</h3>
    <div class="space-y-3">
        @foreach([
            ['01', 'Pilih jenis surat', 'Pilih surat yang ingin diajukan di menu sidebar.'],
            ['02', 'Isi formulir', 'Lengkapi data diri sesuai KTP dan KK yang berlaku.'],
            ['03', 'Upload dokumen', 'Upload foto KTP dan KK yang jelas dan terbaca.'],
            ['04', 'Tunggu verifikasi', 'Petugas desa akan memverifikasi permohonan Anda.'],
            ['05', 'Download surat', 'Surat dapat diunduh setelah permohonan disetujui.'],
        ] as $step)
        <div class="flex items-start gap-4">
            <span class="w-7 h-7 rounded-full bg-green-50 text-green-700 text-xs font-bold flex items-center justify-center flex-shrink-0">
                {{ $step[0] }}
            </span>
            <div>
                <p class="text-sm font-medium text-gray-700">{{ $step[1] }}</p>
                <p class="text-xs text-gray-400 mt-0.5">{{ $step[2] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Syarat dokumen --}}
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-sm font-semibold text-gray-700 mb-3">Syarat Dokumen</h3>
    <ul class="space-y-2">
        @foreach([
            'Foto KTP pemohon yang masih berlaku',
            'Foto Kartu Keluarga (KK)',
            'Ukuran file maksimal 2MB per dokumen',
            'Format file: JPG, PNG, atau JPEG',
        ] as $syarat)
        <li class="flex items-start gap-2 text-sm text-gray-500">
            <span class="text-green-500 mt-0.5">✓</span>
            {{ $syarat }}
        </li>
        @endforeach
    </ul>
</div>

@endsection