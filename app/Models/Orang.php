<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Orang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'id_fingerprint'];
    protected $table = 'orang';

    public $timestamps = false;
}
