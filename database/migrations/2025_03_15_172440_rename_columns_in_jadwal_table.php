<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->renameColumn('WaktuMulai', 'waktu_mulai');
            $table->renameColumn('WaktuSelesai', 'waktu_selesai');
        });
    }

    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->renameColumn('waktu_mulai', 'WaktuMulai');
            $table->renameColumn('waktu_selesai', 'WaktuSelesai');
        });
    }
};

