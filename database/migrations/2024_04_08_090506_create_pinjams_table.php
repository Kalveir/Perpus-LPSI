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

        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('status');
            $table->date('tgl_pinjam');
            $table->integer('lama_pinjam');
            $table->date('tgl_balik');
            $table->date('tgl_kembali');
            $table->string('denda');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
