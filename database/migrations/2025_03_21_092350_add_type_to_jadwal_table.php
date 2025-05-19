<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->string('type')->after('waktu_selesai')->default('murid'); // Add type column
        });
    }
    
    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn('type'); // Remove column if rollback
        });
    }
    
};
