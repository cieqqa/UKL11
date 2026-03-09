<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->id();

            $table->string('nama_usaha');
            $table->text('alamat');
            $table->string('kota');

            $table->foreignId('id_kategori')
                ->constrained('kategori')
                ->onDelete('cascade');

            $table->text('deskripsi');
            $table->string('estimasi_harga');
            $table->string('kontak');

            $table->enum('status_verif', ['pending','disetujui','ditolak'])
                ->default('pending');

            $table->string('foto')->nullable();
            $table->float('rating')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jasa');
    }
};