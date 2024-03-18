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
        Schema::disableForeignKeyConstraints();

        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->constrained();
            $table->foreignId('id_rak')->constrained();
            $table->string('sampul');
            $table->string('isbn');
            $table->string('lampiran');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('penulis');
            $table->date('tahun');
            $table->integer('isi');
            $table->integer('jumlah');
            $table->date('tanggal_masuk');
            $table->string('no_induk');
            $table->string('rf_id');
            $table->string('no_barcode');
            $table->string('peroleh');
            $table->foreignId('rak_id');
            $table->foreignId('kategori_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
