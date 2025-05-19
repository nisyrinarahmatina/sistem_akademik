<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Nilai;
use App\Models\User;
use App\Models\Jadwal;


class NilaiController extends Controller
{

    public function index()
    {
        $nilai = Nilai::all(); 
        return view('admin.inputnilai', compact('nilai'));
    }

    public function create()
    {
    $nilai = Nilai::all(); // Get all subjects
        return view('admin.tambahnilai', compact('nilai')); // Ensure it matches your Blade file
    }
    
    public function store(Request $request)
    {
            // Validate form input
            $request->validate([
                'nama' => 'required|string',
                'kelas' => 'required|string',
                'file_nilai' => 'required|file|mimes:pdf|max:10240',
            ]);
        
            // Store the uploaded file
            $filePath = $request->file('file_nilai')->store('file_nilai', 'public');
        
            // Save to nilai table
            Nilai::create([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'file_nilai' => $filePath,
            ]);
        
            return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan!');
        }        

    public function edit($id)
    {
        $nilai = Nilai::all()->findorFail($id);
        return view('admin.editnilai', compact('nilai')); 
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string',
    //         'kelas' => 'required|string',
    //         'file_nilai' => 'required|file|mimes:pdf|max:10240'
    //     ]);
    
    //     $filePath = $request->file('file_nilai')->store('file_nilai', 'public');

    //     $nilai = Nilai::all()->findOrFail($id);
    //     $nilai->update([
    //         'nama' => $user->nama, 
    //         'kelas' => $user->kelas,          // from users
    //         'file_nilai' => $filePath 
    //     ]);
    //     return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui');
    // }

    public function destroy($id)
    {
        Nilai::findOrFail($id)->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }

    public function showNilai(Request $request)
        { 
        $search = $request->input('search');

        $nilai = Nilai::all();

        return view('murid.nilai', compact('nilai'));
        }

    public function rekapNilai(Request $request)
        { 
        $search = $request->input('search');

        $nilai = Nilai::all();

        return view('guru.rekapnilai', compact('nilai'));
        }
}

