<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuzSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juz_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('juz_id');
            $table->unsignedBigInteger('santri_id');
            $table->timestamps();

            $table->foreign('juz_id')->references('id')->on('juz_tb')->onDelete('cascade');
            $table->foreign('santri_id')->references('id')->on('santri_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juz_santri');
    }
}
