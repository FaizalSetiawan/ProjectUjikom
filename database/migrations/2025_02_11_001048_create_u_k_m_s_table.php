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
        Schema::create('ukms', function (Blueprint $table) { // Nama tabel diperbaiki
            $table->id();
            $table->string('nama_ukm');
            $table->text('deskripsi')->nullable(); // Deskripsi opsional
            $table->string('logo')->nullable(); // Tambahkan kolom logo (opsional)
            $table->unsignedBigInteger('fakultas_id')->nullable(); // Tambahkan foreign key ke fakultas
            $table->timestamps();

            // Foreign key fakultas
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukms');
    }
};
