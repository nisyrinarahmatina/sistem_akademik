<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Presensi;


class GuruController extends Controller
{

    public function showPresensi(Request $request)
    {
        $search = $request->input('search');
    
        $presensiData = Presensi::with('user') // eager load related user
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->get();
    
        return view('guru.presensimurid', compact('presensiData'));
    }

    public function lihatPresensi(Request $request)
    {
        $search = $request->input('search');
    
        $presensiData = Presensi::with('user') // eager load related user
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->get();
    
        return view('murid.presensi', compact('presensiData'));
    }
    
}
    



