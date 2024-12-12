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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_laporan');
            $table->string('nama_pelapor');
            $table->enum('keterangan', ['Kontrakan', 'Kos']);
            $table->string('no_kamar_kontrakan');
            $table->text('deskripsi_laporan');
            $table->enum('status', ['Belum Diproses', 'Proses', 'Selesai']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
