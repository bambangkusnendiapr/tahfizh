<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tb', function (Blueprint $table) {
            $table->id();
            $table->string('surat_nama');
            $table->string('surat_arti')->nullable();
            $table->integer('surat_ayat')->nullable();
            $table->enum('surat_turun', ['Makkiyyah', 'Madaniyyah'])->nullable();
            $table->string('surat_ket')->nullable();
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
        Schema::dropIfExists('surat_tb');
    }
}
