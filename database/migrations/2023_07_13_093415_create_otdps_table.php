<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('otdp', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kepolisian');
            $table->string('no_pelapor');
            $table->string('kota');
            $table->string('umur');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->string('destinasi_tujuan');
            $table->string('destinasi_pulau')->nullable();
            $table->string('provinsi');
            $table->string('nama_file');
            $table->string('foto');
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otdps');
    }
};
