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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->integer('id_anggota')->unsigned();
            $table->integer('id_buku')->unsigned();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
