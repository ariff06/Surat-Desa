<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; color: #000; }
        .kop { display: flex; align-items: center; border-bottom: 3px solid #000; padding-bottom: 8px; margin-bottom: 16px; }
        .kop-logo { width: 80px; margin-right: 16px; }
        .kop-logo img { width: 100%; }
        .kop-text { text-align: center; flex: 1; }
        .kop-text h2 { font-size: 13pt; margin-bottom: 2px; }
        .kop-text h1 { font-size: 16pt; margin-bottom: 2px; }
        .kop-text h3 { font-size: 18pt; font-weight: bold; margin-bottom: 4px; }
        .kop-text p { font-size: 10pt; }
        .judul { text-align: center; margin: 16px 0 4px; }
        .judul h2 { font-size: 14pt; font-weight: bold; text-decoration: underline; }
        .judul p { font-size: 11pt; }
        .isi { margin: 16px 0; line-height: 1.8; text-align: justify; }
        .data-table { width: 100%; margin: 8px 0; }
        .data-table td { padding: 2px 0; vertical-align: top; }
        .data-table td:first-child { width: 160px; }
        .data-table td:nth-child(2) { width: 16px; }
        .section-title { font-weight: bold; margin: 12px 0 4px; }
        .ttd { margin-top: 32px; text-align: right; }
        .ttd p { margin-bottom: 4px; }
        .ttd .nama { font-weight: bold; text-decoration: underline; margin-top: 64px; display: block; }
        .ttd .nip { font-size: 10pt; }
    </style>
</head>
<body>

    {{-- KOP Surat --}}
    <div class="kop">
        <div class="kop-text">
            <h2>PEMERINTAH KABUPATEN KARAWANG</h2>
            <h2>KECAMATAN MAJALAYA</h2>
            <h3>DESA BENGLE</h3>
            <p>Jln. Aswan Krajan I No........... Tlp. (0267) ........ Kode Pos. 41355</p>
            <p>K A R A W A N G</p>
        </div>
    </div>

    {{-- Judul --}}
    <div class="judul">
        <h2>SURAT KETERANGAN TIDAK MAMPU</h2>
        <p>Nomor : 141.4/{{ $permohonan->id }}/DS/{{ date('Y') }}</p>
    </div>

    {{-- Isi --}}
    <div class="isi">
        <p>Yang bertanda tangan dibawah ini Kepala Desa Bengle Kecamatan Majalaya Kabupaten Karawang dengan ini menerangkan bahwa :</p>

        <br>
        <table class="data-table">
            <tr><td>Nama</td><td>:</td><td>{{ strtoupper($permohonan->nama_lengkap) }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $permohonan->jenis_kelamin }}</td></tr>
            <tr><td>Tempat Tgl Lahir</td><td>:</td><td>{{ $permohonan->tempat_lahir }}, {{ \Carbon\Carbon::parse($permohonan->tanggal_lahir)->format('d-m-Y') }}</td></tr>
            <tr><td>Agama</td><td>:</td><td>{{ $permohonan->agama }}</td></tr>
            <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $permohonan->kewarganegaraan }}</td></tr>
            <tr><td>Status Perkawinan</td><td>:</td><td>{{ $permohonan->status_perkawinan }}</td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td>{{ strtoupper($permohonan->pekerjaan) }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $permohonan->alamat }}</td></tr>
        </table>

        <br>
        <p>Adalah orang tua wali dari :</p>
        <br>

        <table class="data-table">
            <tr><td>Nama</td><td>:</td><td>{{ strtoupper($permohonan->anak_nama_lengkap) }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $permohonan->anak_jenis_kelamin }}</td></tr>
            <tr><td>Tempat Tgl Lahir</td><td>:</td><td>{{ $permohonan->anak_tempat_lahir }}, {{ \Carbon\Carbon::parse($permohonan->anak_tanggal_lahir)->format('d-m-Y') }}</td></tr>
            <tr><td>Status Perkawinan</td><td>:</td><td>{{ $permohonan->anak_status_perkawinan }}</td></tr>
            <tr><td>Agama</td><td>:</td><td>{{ $permohonan->anak_agama }}</td></tr>
            <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $permohonan->anak_kewarganegaraan }}</td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td>{{ strtoupper($permohonan->anak_pekerjaan) }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $permohonan->anak_alamat }}</td></tr>
        </table>

        <br>
        <p>Berdasarkan keterangan RT dan RW setempat menerangkan bahwa orang tersebut diatas adalah benar warga Desa Bengle Kecamatan Majalaya Kabupaten Karawang yang kehidupan ekonominya tergolong tidak mampu.</p>
        <p>Surat Keterangan Tidak Mampu ini di gunakan untuk {{ $permohonan->keperluan }}.</p>
        <p>Demikian Surat Keterangan Tidak Mampu ini kami buat dengan sebenarnya dan agar dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    {{-- TTD --}}
    <div class="ttd">
        <p>Bengle, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</p>
        <p>A.n/KEPALA DESA BENGLE</p>
        <p>Sekdes</p>
        <span class="nama">ADI NUGRAHA, S.IP</span>
    </div>

</body>
</html>