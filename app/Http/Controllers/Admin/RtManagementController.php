<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\RtUser;
use App\Models\PermohonanTidakMampu;
use App\Models\PermohonanKematian;

class RtManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $rtUsers = RtUser::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('nomor_rt', 'like', "%{$search}%")
                  ->orWhere('nomor_rw', 'like', "%{$search}%");
        })->orderBy('nomor_rt')->get();

        // Tambahkan statistik per RT
        $rtUsers = $rtUsers->map(function ($rt) {
            $rt->total_permohonan = PermohonanTidakMampu::where('nomor_rt', $rt->nomor_rt)->count()
                                  + PermohonanKematian::where('nomor_rt', $rt->nomor_rt)->count();
            $rt->total_pending    = PermohonanTidakMampu::where('nomor_rt', $rt->nomor_rt)->where('rt_status', 'pending')->count()
                                  + PermohonanKematian::where('nomor_rt', $rt->nomor_rt)->where('rt_status', 'pending')->count();
            $rt->total_approved   = PermohonanTidakMampu::where('nomor_rt', $rt->nomor_rt)->where('rt_status', 'approved')->count()
                                  + PermohonanKematian::where('nomor_rt', $rt->nomor_rt)->where('rt_status', 'approved')->count();
            return $rt;
        });

        return view('admin.rt.index', compact('rtUsers', 'search'));
    }

    public function show($id)
    {
        $rt = RtUser::findOrFail($id);

        $tidakMampu = PermohonanTidakMampu::where('nomor_rt', $rt->nomor_rt)->latest()->get();
        $kematian   = PermohonanKematian::where('nomor_rt', $rt->nomor_rt)->latest()->get();

        return view('admin.rt.show', compact('rt', 'tidakMampu', 'kematian'));
    }

    public function toggleActive($id)
    {
        $rt = RtUser::findOrFail($id);
        $rt->update(['is_active' => !$rt->is_active]);

        $status = $rt->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Akun RT {$rt->nomor_rt} berhasil {$status}.");
    }

    public function resetPassword($id)
    {
        $rt = RtUser::findOrFail($id);
        $newPassword = 'rt' . $rt->nomor_rt . 'bengle';
        $rt->update(['password' => Hash::make($newPassword)]);

        return back()->with('success', "Password RT {$rt->nomor_rt} berhasil direset ke default.");
    }
}