<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal'; // Table name

    protected $fillable = [ 'nama_murid', 'nama_guru', 'mapel_id','nama_mapel', 'kelas', 'hari', 'waktu_mulai', 'waktu_selesai','type'];
    
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id'); // Foreign key relationship
    }
}