<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_tb', function (Blueprint $table) {
            $table->id();
            $table->string('komentar_nama');
            $table->string('komentar_email')->nullable();
            $table->string('komentar_no', 20)->nullable();
            $table->text('komentar_isi');
            $table->unsignedBigInteger('artikel_id');
            $table->timestamps();

            $table->foreign('artikel_id')->references('id')->on('artikel_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_tb');
    }
}
