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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telp');
            $table->text('alamat');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('divisi');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir')->nullable();
            $table->boolean('status_aktif')->default(1);
            $table->text('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
