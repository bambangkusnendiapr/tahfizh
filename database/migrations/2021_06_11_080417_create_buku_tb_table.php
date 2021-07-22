<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_tb', function (Blueprint $table) {
            $table->id();
            $table->date('buku_tgl');
            $table->unsignedBigInteger('santri_id');
            $table->unsignedBigInteger('guru_id');
            $table->string('buku_jilid');
            $table->string('buku_halaman');
            $table->string('buku_murajaah');
            $table->string('buku_ziyadah');
            $table->integer('nilai_id')->nullable();
            $table->text('buku_ket')->nullable();
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santri_tb')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('guru_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_tb');
    }
}
