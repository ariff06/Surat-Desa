@extends('layouts.guest')

@section('slot')

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Status Permohonan</h2>
    <p class="text-xs text-gray-400 mt-0.5">Cek status permohonan surat keterangan Anda</p>
</div>

{{-- Status card --}}
<div class="bg-white rounded-lg shadow p-6 mb-4">

    {{-- Status badge --}}
    <div class="flex items-center justify-between mb-5">
        <div>
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Jenis Surat</p>
            <p class="text-sm font-semibold text-gray-700">
                {{ $tipe === 'tidak_mampu' ? 'Surat Keterangan Tidak Mampu' : 'Surat Keterangan Kematian' }}
            </p>
        </div>
        <div>
            @if($permohonan->status === 'pending')
                <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                    ⏳ Menunggu Verifikasi
                </span>
            @elseif($permohonan->status === 'approved')
                <span class="bg-green-50 text-green-700 border border-green-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                    ✅ Disetujui
                </span>
            @else
                <span class="bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">
                    ❌ Ditolak
                </span>
            @endif
        </div>
    </div>

    {{-- Kode referensi --}}
    <div class="bg-gray-50 rounded-lg p-4 mb-5">
        <p class="text-xs text-gray-400 mb-1">Kode Referensi</p>
        <p class="text-sm font-mono font-semibold text-gray-700 break-all">{{ $permohonan->token_download }}</p>
        <p class="text-xs text-gray-400 mt-2">Simpan kode ini untuk mengecek status permohonan Anda.</p>
    </div>

    {{-- Data permohonan --}}
    <div class="space-y-3">
        <p class="text-xs text-gray-400 uppercase tracking-wide">Detail Permohonan</p>

        @if($tipe === 'tidak_mampu')
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-gray-400 text-xs">Nama Pemohon</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->nama_lengkap }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Keperluan</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->keperluan }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Nama Anak</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->anak_nama_lengkap }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Tanggal Pengajuan</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->created_at->format('d M Y') }}</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-gray-400 text-xs">Nama Jenazah</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->nama_jenazah }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Tanggal Meninggal</p>
                    <p class="text-gray-700 font-medium">{{ \Carbon\Carbon::parse($permohonan->tanggal_meninggal)->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Nama Pelapor</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->nama_pelapor }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Tanggal Pengajuan</p>
                    <p class="text-gray-700 font-medium">{{ $permohonan->created_at->format('d M Y') }}</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Catatan admin --}}
    @if($permohonan->catatan_admin)
        <div class="mt-5 bg-blue-50 border border-blue-100 rounded-lg p-4">
            <p class="text-xs text-blue-600 font-semibold mb-1">Catatan dari Petugas</p>
            <p class="text-sm text-blue-700">{{ $permohonan->catatan_admin }}</p>
        </div>
    @endif

    {{-- Tombol download --}}
    @if($permohonan->status === 'approved')
        <div class="mt-5">
            @if($permohonan->downloaded_at)
                <div class="w-full block text-center bg-gray-100 border border-gray-200 text-gray-400 py-3 rounded-xl font-semibold text-sm cursor-not-allowed">
                    ✓ Surat Sudah Didownload
                </div>
                <p class="text-xs text-gray-400 text-center mt-2">
                    Didownload pada {{ \Carbon\Carbon::parse($permohonan->downloaded_at)->format('d M Y, H:i') }} WIB.
                    Jika membutuhkan salinan, silakan hubungi kantor desa.
                </p>
            @else
                <a href="{{ route('surat.download', ['tipe' => $tipe, 'token' => $permohonan->token_download]) }}"
                    class="w-full block text-center text-white py-3 rounded-xl font-semibold text-sm transition-all duration-200 hover:opacity-90"
                    style="background: linear-gradient(135deg, #14532d, #16a34a);">
                    ⬇ Download Surat
                </a>
            @endif
        </div>
    @endif

</div>

{{-- Cek status lain --}}
<div class="bg-white rounded-lg shadow p-5">
    <p class="text-sm font-medium text-gray-700 mb-3">Cek Status Permohonan Lain</p>
    <form method="GET" action="{{ route('surat.cek-status') }}">
        <div class="flex gap-3">
            <input type="text" name="token" placeholder="Masukkan kode referensi"
                class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            <select name="tipe" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                <option value="tidak_mampu">Tidak Mampu</option>
                <option value="kematian">Kematian</option>
            </select>
            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                Cek
            </button>
        </div>
    </form>
</div>

@endsection