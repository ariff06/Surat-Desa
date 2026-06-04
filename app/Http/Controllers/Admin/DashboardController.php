<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanTidakMampu;
use App\Models\PermohonanKematian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTidakMampu = PermohonanTidakMampu::count();
        $totalKematian   = PermohonanKematian::count();
        $totalPermohonan = $totalTidakMampu + $totalKematian;

        $totalPending  = PermohonanTidakMampu::where('status', 'pending')->count()
                       + PermohonanKematian::where('status', 'pending')->count();
        $totalApproved = PermohonanTidakMampu::where('status', 'approved')->count()
                       + PermohonanKematian::where('status', 'approved')->count();
        $totalRejected = PermohonanTidakMampu::where('status', 'rejected')->count()
                       + PermohonanKematian::where('status', 'rejected')->count();

        // Gabungkan permohonan terbaru dari kedua tabel
        $tidakMampu = PermohonanTidakMampu::latest()->take(5)->get()->map(function ($item) {
            return [
                'id'      => $item->id,
                'tipe'    => 'tidak_mampu',
                'nama'    => $item->nama_lengkap,
                'jenis'   => 'Tidak Mampu',
                'status'  => $item->status,
                'tanggal' => $item->created_at->format('d M Y'),
            ];
        });

        $kematian = PermohonanKematian::latest()->take(5)->get()->map(function ($item) {
            return [
                'id'      => $item->id,
                'tipe'    => 'kematian',
                'nama'    => $item->nama_jenazah,
                'jenis'   => 'Kematian',
                'status'  => $item->status,
                'tanggal' => $item->created_at->format('d M Y'),
            ];
        });

        $permohonanTerbaru = $tidakMampu->concat($kematian)
            ->sortByDesc('tanggal')
            ->take(5)
            ->values();

        return view('admin.dashboard', compact(
            'totalPermohonan',
            'totalTidakMampu',
            'totalKematian',
            'totalPending',
            'totalApproved',
            'totalRejected',
            'permohonanTerbaru'
        ));
    }
}