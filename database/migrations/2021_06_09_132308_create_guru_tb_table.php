<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_tb', function (Blueprint $table) {
            $table->id();
            $table->enum('guru_jk', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('guru_lahir')->nullable();
            $table->date('guru_tgl')->nullable();
            $table->string('guru_no', 20)->nullable();
            $table->text('guru_alamat')->nullable();
            $table->text('guru_ket')->nullable();
            $table->integer('surat_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru_tb');
    }
}
