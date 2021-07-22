<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->unsignedBigInteger('surat_id');
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santri_tb')->onDelete('cascade');
            $table->foreign('surat_id')->references('id')->on('surat_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santri_surat');
    }
}
