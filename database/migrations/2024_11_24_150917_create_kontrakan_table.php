<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontrakans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('no_kamar'); // Nomor kamar
            $table->enum('status', ['terisi', 'kosong']); // Status: terisi atau kosong
            $table->enum('keterangan', ['kos', 'kontrakan']); // Keterangan: kos atau kontrakan
            $table->string('foto')->nullable(); // Foto kontrakan (nullable jika tidak ada foto)
            $table->decimal('harga', 15, 2); // Harga kontrakan dengan tipe decimal
            $table->text('deskripsi')->nullable(); // Deskripsi kontrakan (nullable jika tidak ada deskripsi)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrakans');
    }
};
