<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;


class JadwalController extends Controller
{
    //punya admin
    public function index()
    {
        $jadwal = Jadwal::where('type','guru')->get(); // Fetch data from the database
        return view('admin.inputjadwalguru', compact('jadwal')); // Ensure the view name matches
    }

    public function create()
    {
        $jadwal = Jadwal::all(); // Get all subjects
        return view('admin.tambahjadwalguru', compact('jadwal')); // Ensure it matches your Blade file
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string',
            'nama_mapel' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);

        Jadwal::create([
            'nama_guru' => $request->nama_guru,
            'nama_murid' => null,
            'nama_mapel' => $request->nama_mapel, // Make sure this matches your database column
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'type' => 'guru'
        ]);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::where('type','guru')->findorFail($id);
        return view('admin.editjadwalguru', compact('jadwal')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string',
            'nama_mapel' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);
    
        $jadwal = Jadwal::where('type','guru')->findOrFail($id);
        $jadwal->update([
            'nama_guru' => $request->nama_guru,
            'nama_mapel' => $request->nama_mapel,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai
        ]);
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }

    public function indexJadwalMurid()
    {
        $jadwal = Jadwal::where('type','murid')->get(); // Fetch data from the database
        return view('admin.inputjadwalmurid', compact('jadwal')); // Ensure the view name matches
    }

    public function createJadwalMurid()
    {
        $jadwal = Jadwal::all();
        return view('admin.tambahjadwalmurid', compact('jadwal'));
    }

    public function storeJadwalMurid(Request $request)
    {
        $request->validate([
            'nama_murid' => 'required|string',
            'nama_mapel' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
           
            
        ]);
        Jadwal::create([
            'nama_murid' => $request->nama_murid,
            'nama_guru' => null,
            'nama_mapel' => $request->nama_mapel, // This should match the form input
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'type' => 'murid'
            
        ]);
        
        return redirect()->route('jadwal.indexJadwalMurid')->with('success', 'Jadwal berhasil ditambahkan');
    }
    
    public function editJadwalMurid($id)
    {
        $jadwal = Jadwal::where('type','murid')->findorFail($id);
        return view('admin.editjadwalmurid', compact('jadwal')); 
    }
    public function updateJadwalMurid(Request $request, $id)
    {
        $request->validate([
            'nama_murid' => 'required|string',
            'nama_mapel' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);
    
        $jadwal = Jadwal::where('type','murid')->findOrFail($id);
        $jadwal->update([
            'nama_murid' => $request->nama_murid,
            'nama_mapel' => $request->nama_mapel, // This should match the form input
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);
    
        return redirect()->route('jadwal.indexJadwalMurid')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroyJadwalMurid($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('jadwal.indexJadwalMurid')->with('success', 'Jadwal berhasil dihapus');
    }


    //punya guru
    public function showJadwalGuru()
    {
        $jadwal = Jadwal::where('type', 'guru')->whereNotNull('nama_guru')->get();
        return view('guru.jadwalmengajar', compact('jadwal'));
    }

    public function showJadwalMurid(Request $request)
    { 
    $search = $request->input('search');

    $jadwal = Jadwal::query()
    ->where('type', 'murid')
    ->whereNotNull('nama_murid')
    ->when($search, function ($query, $search) {
        $query->where('nama_murid', 'like', "%$search%")
              ->orWhere('Kelas', 'like', "%$search%")
              ->orWhere('Hari', 'like', "%$search%")
              ->orWhereHas('mapel', function ($q) use ($search) {
                  $q->where('nama_mapel', 'like', "%$search%");
              });
    })
    ->get();


    return view('murid.jadwalpelajaran', compact('jadwal'));
    }

}
