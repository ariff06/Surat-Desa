@extends('layouts.guest')

@section('slot')

<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Cek Status Surat</h2>
    <p class="text-xs text-gray-400 mt-0.5">Masukkan kode referensi yang diterima setelah pengajuan</p>
</div>

@if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6 text-sm">
        <p class="font-semibold mb-1">Data tidak ditemukan</p>
        <p>{{ session('error') }}</p>
        <p class="mt-2 text-red-600">Kemungkinan penyebab:
            <ul class="list-disc list-inside mt-1 space-y-1">
                <li>Kode referensi salah atau tidak lengkap</li>
                <li>Jenis surat yang dipilih tidak sesuai</li>
            </ul>
        </p>
    </div>
@endif

<div class="bg-white rounded-lg shadow p-6">
    <form method="GET" action="{{ route('surat.cek-status') }}">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Referensi</label>
                <input type="text" name="token" value="{{ request('token') }}"
                    placeholder="Masukkan kode referensi permohonan"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat</label>
                <select name="tipe" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="tidak_mampu" {{ request('tipe') == 'tidak_mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                    <option value="kematian" {{ request('tipe') == 'kematian' ? 'selected' : '' }}>Surat Keterangan Kematian</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white py-3 rounded-xl font-semibold text-sm transition-all duration-200 hover:opacity-90"
                style="background: linear-gradient(135deg, #14532d, #16a34a);">
                Cek Status →
            </button>
        </div>
    </form>
</div>

@endsection