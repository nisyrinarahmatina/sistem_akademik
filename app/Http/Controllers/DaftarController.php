<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Orang;
use Illuminate\Support\Facades\Schema;

class DaftarController extends Controller
{

    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|string',
        'id_fingerprint' => 'required|integer',
        'username' => 'required|string',
        'password' => 'required|string',
    ]);


    DB::transaction(function () use ($request) {

        // 2. Insert into users table
        DB::table('users')->insert([
            'id' => $request->id_fingerprint, // manually assign user ID
            'nama' => $request->nama, 
            'username' => $request->username, 
            'password' => Hash::make($request->password),
        ]);

        // 1. Insert into orang table
        DB::table('orang')->insert([
            'nama' => $request->nama, 
            'id_fingerprint' => $request->id_fingerprint,

        ]);
        
        // 3. Update status in action table
        DB::table('action')
        ->where('status', 0) // or use another condition to target the correct row
        ->update([
            'id_fingerprint' => $request->id_fingerprint,
            'status' => 1,
        ]);

    });
    return back()->with('success', 'Data berhasil didaftarkan dan status fingerprint diperbarui.');
    }
}