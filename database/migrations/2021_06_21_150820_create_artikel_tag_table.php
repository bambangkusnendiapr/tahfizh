<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artikel_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('artikel_id')->references('id')->on('artikel_tb')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag_tb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_tag');
    }
}
