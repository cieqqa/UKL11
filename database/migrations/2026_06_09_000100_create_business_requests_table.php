<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nama_usaha');
            $table->string('company_type')->nullable(); // PT or CV
            $table->string('service_name')->nullable();
            $table->unsignedBigInteger('estimasi_harga')->nullable();
            $table->string('kota')->nullable();
            $table->foreignId('id_kategori')->nullable()->constrained('kategori')->nullOnDelete();
            $table->text('deskripsi')->nullable();
            $table->string('kontak')->nullable();
            $table->string('alamat')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_requests');
    }
};
