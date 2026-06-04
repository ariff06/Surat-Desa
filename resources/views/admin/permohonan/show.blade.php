@extends('layouts.admin')

@section('content')

    <a href="{{ route('admin.permohonan.index') }}"
        class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 mb-6 transition">
        ← Kembali ke Daftar Permohonan
    </a>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom kiri - detail data --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-400 mb-1">Jenis Surat</p>
                    <p class="text-sm font-semibold text-gray-700">
                        {{ $tipe === 'tidak_mampu' ? 'Surat Keterangan Tidak Mampu' : 'Surat Keterangan Kematian' }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">Diajukan {{ $permohonan->created_at->format('d M Y, H:i') }} WIB</p>
                </div>
                @if($permohonan->status === 'pending')
                    <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 text-xs font-semibold px-3 py-1.5 rounded-full">⏳ Pending</span>
                @elseif($permohonan->status === 'approved')
                    <span class="bg-green-50 text-green-700 border border-green-200 text-xs font-semibold px-3 py-1.5 rounded-full">✅ Disetujui</span>
                @else
                    <span class="bg-red-50 text-red-700 border border-red-200 text-xs font-semibold px-3 py-1.5 rounded-full">❌ Ditolak</span>
                @endif
            </div>

            @if($tipe === 'tidak_mampu')
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Data Pemohon</p>
                    </div>
                    <div class="p-5 grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-xs text-gray-400">Nama Lengkap</p><p class="text-gray-700 font-medium">{{ $permohonan->nama_lengkap }}</p></div>
                        <div><p class="text-xs text-gray-400">Jenis Kelamin</p><p class="text-gray-700 font-medium">{{ $permohonan->jenis_kelamin }}</p></div>
                        <div><p class="text-xs text-gray-400">Tempat, Tgl Lahir</p><p class="text-gray-700 font-medium">{{ $permohonan->tempat_lahir }}, {{ \Carbon\Carbon::parse($permohonan->tanggal_lahir)->format('d M Y') }}</p></div>
                        <div><p class="text-xs text-gray-400">Agama</p><p class="text-gray-700 font-medium">{{ $permohonan->agama }}</p></div>
                        <div><p class="text-xs text-gray-400">Status Perkawinan</p><p class="text-gray-700 font-medium">{{ $permohonan->status_perkawinan }}</p></div>
                        <div><p class="text-xs text-gray-400">Pekerjaan</p><p class="text-gray-700 font-medium">{{ $permohonan->pekerjaan }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Alamat</p><p class="text-gray-700 font-medium">{{ $permohonan->alamat }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Keperluan</p><p class="text-gray-700 font-medium">{{ $permohonan->keperluan }}</p></div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Data Anak</p>
                    </div>
                    <div class="p-5 grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-xs text-gray-400">Nama Lengkap</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_nama_lengkap }}</p></div>
                        <div><p class="text-xs text-gray-400">Jenis Kelamin</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_jenis_kelamin }}</p></div>
                        <div><p class="text-xs text-gray-400">Tempat, Tgl Lahir</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_tempat_lahir }}, {{ \Carbon\Carbon::parse($permohonan->anak_tanggal_lahir)->format('d M Y') }}</p></div>
                        <div><p class="text-xs text-gray-400">Agama</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_agama }}</p></div>
                        <div><p class="text-xs text-gray-400">Status Perkawinan</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_status_perkawinan }}</p></div>
                        <div><p class="text-xs text-gray-400">Pekerjaan</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_pekerjaan }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Alamat</p><p class="text-gray-700 font-medium">{{ $permohonan->anak_alamat }}</p></div>
                    </div>
                </div>

            @else
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Data Jenazah</p>
                    </div>
                    <div class="p-5 grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-xs text-gray-400">NIK</p><p class="text-gray-700 font-medium">{{ $permohonan->nik_jenazah }}</p></div>
                        <div><p class="text-xs text-gray-400">Nama Lengkap</p><p class="text-gray-700 font-medium">{{ $permohonan->nama_jenazah }}</p></div>
                        <div><p class="text-xs text-gray-400">Jenis Kelamin</p><p class="text-gray-700 font-medium">{{ $permohonan->jenis_kelamin_jenazah }}</p></div>
                        <div><p class="text-xs text-gray-400">Agama</p><p class="text-gray-700 font-medium">{{ $permohonan->agama_jenazah }}</p></div>
                        <div><p class="text-xs text-gray-400">Umur</p><p class="text-gray-700 font-medium">{{ $permohonan->umur_jenazah }} Tahun</p></div>
                        <div><p class="text-xs text-gray-400">Pekerjaan</p><p class="text-gray-700 font-medium">{{ $permohonan->pekerjaan_jenazah }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Alamat</p><p class="text-gray-700 font-medium">{{ $permohonan->alamat_jenazah }}</p></div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Data Kematian</p>
                    </div>
                    <div class="p-5 grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-xs text-gray-400">Hari Meninggal</p><p class="text-gray-700 font-medium">{{ $permohonan->hari_meninggal }}</p></div>
                        <div><p class="text-xs text-gray-400">Tanggal Meninggal</p><p class="text-gray-700 font-medium">{{ \Carbon\Carbon::parse($permohonan->tanggal_meninggal)->format('d M Y') }}</p></div>
                        <div><p class="text-xs text-gray-400">Pukul</p><p class="text-gray-700 font-medium">{{ $permohonan->pukul_meninggal }} WIB</p></div>
                        <div><p class="text-xs text-gray-400">Penyebab</p><p class="text-gray-700 font-medium">{{ $permohonan->penyebab_kematian }}</p></div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Data Pelapor</p>
                    </div>
                    <div class="p-5 grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-xs text-gray-400">NIK</p><p class="text-gray-700 font-medium">{{ $permohonan->nik_pelapor }}</p></div>
                        <div><p class="text-xs text-gray-400">Nama Lengkap</p><p class="text-gray-700 font-medium">{{ $permohonan->nama_pelapor }}</p></div>
                        <div><p class="text-xs text-gray-400">Agama</p><p class="text-gray-700 font-medium">{{ $permohonan->agama_pelapor }}</p></div>
                        <div><p class="text-xs text-gray-400">Pekerjaan</p><p class="text-gray-700 font-medium">{{ $permohonan->pekerjaan_pelapor }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Alamat</p><p class="text-gray-700 font-medium">{{ $permohonan->alamat_pelapor }}</p></div>
                        <div class="col-span-2"><p class="text-xs text-gray-400">Hubungan dengan Jenazah</p><p class="text-gray-700 font-medium">{{ $permohonan->hubungan_pelapor }}</p></div>
                    </div>
                </div>
            @endif

            {{-- Dokumen upload --}}
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                    <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Dokumen Upload</p>
                </div>
                <div class="p-5 grid grid-cols-2 gap-4">
                    @foreach($permohonan->dokumen as $dok)
                        <div>
                            <p class="text-xs text-gray-400 mb-2 uppercase">{{ $dok->jenis }}</p>
                            <img src="{{ asset('storage/' . $dok->path_file) }}"
                                class="w-full rounded-lg border border-gray-200 object-cover"
                                style="max-height: 200px;">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Kolom kanan - aksi --}}
        <div class="space-y-5">

            @if($permohonan->status === 'pending')
                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-sm font-semibold text-gray-700 mb-4">Tindakan</p>

                    <form method="POST" action="{{ route('admin.permohonan.approve', ['tipe' => $tipe, 'id' => $permohonan->id]) }}" class="mb-3">
                        @csrf
                        <div class="mb-3">
                            <label class="block text-xs text-gray-500 mb-1">Catatan (opsional)</label>
                            <textarea name="catatan_admin" rows="3"
                                placeholder="Tambahkan catatan untuk pemohon..."
                                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2.5 rounded-lg text-sm font-semibold transition">
                            ✅ Setujui Permohonan
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.permohonan.reject', ['tipe' => $tipe, 'id' => $permohonan->id]) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="block text-xs text-gray-500 mb-1">Alasan penolakan <span class="text-red-500">*</span></label>
                            <textarea name="catatan_admin" rows="3" required
                                placeholder="Tuliskan alasan penolakan..."
                                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 py-2.5 rounded-lg text-sm font-semibold transition">
                            ❌ Tolak Permohonan
                        </button>
                    </form>
                </div>

            @else
                <div class="bg-white rounded-lg shadow p-5">
                    <p class="text-sm font-semibold text-gray-700 mb-3">Status Permohonan</p>
                    @if($permohonan->status === 'approved')
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-sm text-green-700">
                            Permohonan ini telah disetujui.
                        </div>
                    @else
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3 text-sm text-red-700">
                            Permohonan ini telah ditolak.
                        </div>
                    @endif
                    @if($permohonan->catatan_admin)
                        <div class="mt-3">
                            <p class="text-xs text-gray-400 mb-1">Catatan</p>
                            <p class="text-sm text-gray-600">{{ $permohonan->catatan_admin }}</p>
                        </div>
                    @endif
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-xs text-gray-400 mb-1">Kode Referensi Warga</p>
                <p class="text-xs font-mono text-gray-600 break-all mb-3">{{ $permohonan->token_download }}</p>

                @if($permohonan->status === 'approved')
                    <a href="{{ route('admin.download', ['tipe' => $tipe, 'token' => $permohonan->token_download]) }}"
                        class="w-full block text-center bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg text-sm font-semibold transition">
                        ⬇ Download PDF (Admin)
                    </a>

                    @if($permohonan->downloaded_at)
                        <p class="text-xs text-gray-400 text-center mt-2">
                            Warga mendownload pada<br>
                            {{ \Carbon\Carbon::parse($permohonan->downloaded_at)->format('d M Y, H:i') }} WIB
                        </p>
                    @else
                        <p class="text-xs text-gray-400 text-center mt-2">Warga belum mendownload surat.</p>
                    @endif
                @endif
            </div>

        </div>
    </div>

@endsection