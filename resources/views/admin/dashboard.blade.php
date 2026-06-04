@extends('layouts.admin')

@section('content')

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Dashboard</h2>
        <p class="text-xs text-gray-400 mt-0.5">Selamat datang, {{ Auth::guard('admin')->user()->name }}</p>
    </div>

    {{-- Stats cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Total Permohonan</p>
            <p class="text-2xl font-bold text-gray-700">{{ $totalPermohonan }}</p>
            <p class="text-xs text-gray-400 mt-1">Semua jenis surat</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Menunggu</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $totalPending }}</p>
            <p class="text-xs text-gray-400 mt-1">Perlu ditindaklanjuti</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Disetujui</p>
            <p class="text-2xl font-bold text-green-600">{{ $totalApproved }}</p>
            <p class="text-xs text-gray-400 mt-1">Surat telah diterbitkan</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Ditolak</p>
            <p class="text-2xl font-bold text-red-500">{{ $totalRejected }}</p>
            <p class="text-xs text-gray-400 mt-1">Permohonan ditolak</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Permohonan terbaru --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <p class="text-sm font-semibold text-gray-700">Permohonan Terbaru</p>
                <a href="{{ route('admin.permohonan.index') }}" class="text-xs text-blue-600 hover:underline">Lihat semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($permohonanTerbaru as $item)
                    <div class="px-5 py-3 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-700">{{ $item['nama'] }}</p>
                            <p class="text-xs text-gray-400">{{ $item['jenis'] }} &bull; {{ $item['tanggal'] }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            @if($item['status'] === 'pending')
                                <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 text-xs px-2 py-0.5 rounded-full">Pending</span>
                            @elseif($item['status'] === 'approved')
                                <span class="bg-green-50 text-green-700 border border-green-200 text-xs px-2 py-0.5 rounded-full">Disetujui</span>
                            @else
                                <span class="bg-red-50 text-red-700 border border-red-200 text-xs px-2 py-0.5 rounded-full">Ditolak</span>
                            @endif
                            <a href="{{ route('admin.permohonan.show', ['tipe' => $item['tipe'], 'id' => $item['id']]) }}"
                                class="text-xs text-blue-600 hover:underline">Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="px-5 py-8 text-center text-gray-400 text-sm">Belum ada permohonan masuk.</div>
                @endforelse
            </div>
        </div>

        {{-- Ringkasan per jenis --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100">
                <p class="text-sm font-semibold text-gray-700">Ringkasan Per Jenis Surat</p>
            </div>
            <div class="p-5 space-y-4">
                {{-- Tidak Mampu --}}
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-sm text-gray-600">Surat Tidak Mampu</p>
                        <p class="text-sm font-semibold text-gray-700">{{ $totalTidakMampu }}</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full"
                            style="width: {{ $totalPermohonan > 0 ? ($totalTidakMampu / $totalPermohonan) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>
                {{-- Kematian --}}
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-sm text-gray-600">Surat Kematian</p>
                        <p class="text-sm font-semibold text-gray-700">{{ $totalKematian }}</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full"
                            style="width: {{ $totalPermohonan > 0 ? ($totalKematian / $totalPermohonan) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-4 space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Pending</span>
                        <span class="font-medium text-yellow-600">{{ $totalPending }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Disetujui</span>
                        <span class="font-medium text-green-600">{{ $totalApproved }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Ditolak</span>
                        <span class="font-medium text-red-500">{{ $totalRejected }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection