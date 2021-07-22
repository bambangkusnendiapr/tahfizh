<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tb', function (Blueprint $table) {
            $table->id();
            $table->date('artikel_tgl');
            $table->text('artikel_slug');
            $table->string('artikel_gambar');
            $table->text('artikel_judul');
            $table->text('artikel_isi');
            $table->text('artikel_ket');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_tb');
    }
}
