<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanTidakMampu;
use App\Models\PermohonanKematian;

class PermohonanAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tidakMampu = PermohonanTidakMampu::when($search, function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('anak_nama_lengkap', 'like', "%{$search}%");
        })->latest()->get();

        $kematian = PermohonanKematian::when($search, function ($query) use ($search) {
            $query->where('nama_jenazah', 'like', "%{$search}%")
                ->orWhere('nama_pelapor', 'like', "%{$search}%");
        })->latest()->get();

        return view('admin.permohonan.index', compact('tidakMampu', 'kematian', 'search'));
    }

    public function show($tipe, $id)
    {
        if ($tipe === 'tidak_mampu') {
            $permohonan = PermohonanTidakMampu::with('dokumen')->findOrFail($id);
        } else {
            $permohonan = PermohonanKematian::with('dokumen')->findOrFail($id);
        }

        return view('admin.permohonan.show', compact('permohonan', 'tipe'));
    }

    public function approve(Request $request, $tipe, $id)
    {
        $request->validate([
            'catatan_admin' => 'nullable|string',
        ]);

        if ($tipe === 'tidak_mampu') {
            $permohonan = PermohonanTidakMampu::findOrFail($id);
        } else {
            $permohonan = PermohonanKematian::findOrFail($id);
        }

        $permohonan->update([
            'status'        => 'approved',
            'catatan_admin' => $request->catatan_admin,
        ]);

        return back()->with('success', 'Permohonan berhasil disetujui.');
    }

    public function reject(Request $request, $tipe, $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string',
        ]);

        if ($tipe === 'tidak_mampu') {
            $permohonan = PermohonanTidakMampu::findOrFail($id);
        } else {
            $permohonan = PermohonanKematian::findOrFail($id);
        }

        $permohonan->update([
            'status'        => 'rejected',
            'catatan_admin' => $request->catatan_admin,
        ]);

        return back()->with('success', 'Permohonan berhasil ditolak.');
    }
}