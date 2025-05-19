<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel'; // Table name
    protected $fillable = ['NamaMapel']; // Columns that can be mass assigned

    // Relationship: One Mapel has many Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'MataPelajaran'); // Foreign key in 'jadwal' table
    }
}
