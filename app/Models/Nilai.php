<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai'; // Table name

    protected $fillable = ['id_murid', 'nama', 'kelas', 'file_nilai'];

}
