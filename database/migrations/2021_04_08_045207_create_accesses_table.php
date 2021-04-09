<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('desa_id');
            $table->bigInteger('pegawai_id');
            $table->boolean('kalender')->default('0');
            $table->boolean('template')->default('0');
            $table->boolean('log_user')->default('0');
            $table->boolean('perpustakaan')->default('0');
            $table->boolean('buku_tamu')->default('0');
            $table->boolean('keuangan')->default('0');
            $table->boolean('data_penduduk')->default('0');
            $table->boolean('struktur_desa')->default('0');
            $table->boolean('profil_desa')->default('0');
            $table->boolean('berita')->default('0');
            $table->boolean('administrasi')->default('0');
            $table->boolean('potensi_desa')->default('0');
            $table->boolean('slider')->default('0');
            $table->boolean('peristiwa')->default('0');
            $table->boolean('wisata_desa')->default('0');            
            $table->boolean('pengumuman')->default('0');
            $table->boolean('kampanye')->default('0');
            $table->boolean('referensi')->default('0');
            $table->boolean('pengaduan')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
