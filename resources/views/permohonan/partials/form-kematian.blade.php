@if ($errors->any() && session()->has('_old_input'))
    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6 text-sm">
        <p class="font-semibold mb-2">Mohon periksa kembali isian berikut:</p>
        <ul class="space-y-1">
            @foreach ($errors->all() as $error)
                <li class="flex items-start gap-2">
                    <span class="mt-0.5">•</span>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('surat.store.kematian') }}" enctype="multipart/form-data">
    @csrf

    <x-form-card title="Data Jenazah">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIK Jenazah</label>
                <input type="text" name="nik_jenazah" value="{{ old('nik_jenazah') }}"
                    maxlength="16" placeholder="16 digit NIK"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Jenazah</label>
                <input type="text" name="nama_jenazah" value="{{ old('nama_jenazah') }}"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin_jenazah" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin_jenazah') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_jenazah') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                    <select name="agama_jenazah" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="">-- Pilih --</option>
                        @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama_jenazah') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Umur</label>
                    <input type="number" name="umur_jenazah" value="{{ old('umur_jenazah') }}"
                        placeholder="Tahun"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                    <input type="text" name="pekerjaan_jenazah" value="{{ old('pekerjaan_jenazah') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                <textarea name="alamat_jenazah" rows="2"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">{{ old('alamat_jenazah') }}</textarea>
            </div>
        </div>
    </x-form-card>

    <x-form-card title="Data Kematian">
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hari Meninggal</label>
                    <select name="hari_meninggal" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="">-- Pilih --</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari_meninggal') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Meninggal</label>
                    <input type="date" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pukul</label>
                    <input type="time" name="pukul_meninggal" value="{{ old('pukul_meninggal') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penyebab Kematian</label>
                    <input type="text" name="penyebab_kematian" value="{{ old('penyebab_kematian') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>
        </div>
    </x-form-card>

    <x-form-card title="Data Pelapor">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIK Pelapor</label>
                <input type="text" name="nik_pelapor" value="{{ old('nik_pelapor') }}"
                    maxlength="16" placeholder="16 digit NIK"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                    <select name="agama_pelapor" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="">-- Pilih --</option>
                        @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama_pelapor') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                    <input type="text" name="pekerjaan_pelapor" value="{{ old('pekerjaan_pelapor') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                <textarea name="alamat_pelapor" rows="2"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">{{ old('alamat_pelapor') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Hubungan dengan Jenazah</label>
                <input type="text" name="hubungan_pelapor" value="{{ old('hubungan_pelapor') }}"
                    placeholder="Contoh: Anak, Suami, Istri, dll"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
        </div>
    </x-form-card>

    <x-form-card title="Dokumen Pendukung">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Foto KTP Pelapor <span class="text-gray-400 font-normal text-xs">(maks. 2MB)</span>
                </label>
                <input type="file" name="ktp" accept="image/*"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Foto KK <span class="text-gray-400 font-normal text-xs">(maks. 2MB)</span>
                </label>
                <input type="file" name="kk" accept="image/*"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
            </div>
        </div>
    </x-form-card>

    <button type="submit"
        class="w-full text-white py-3 rounded-xl font-semibold text-sm transition-all duration-200 hover:opacity-90 active:scale-95"
        style="background: linear-gradient(135deg, #14532d, #16a34a);">
        Kirim Permohonan →
    </button>

</form>