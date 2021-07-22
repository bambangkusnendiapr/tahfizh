<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri_tb', function (Blueprint $table) {
            $table->id();
            $table->string('santri_panggil', 50)->nullable();
            $table->string('santri_nik', 20)->nullable();
            $table->string('santri_lahir')->nullable();
            $table->date('santri_tgl')->nullable();
            $table->enum('santri_jk', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('santri_umur', 50)->nullable();
            $table->string('santri_hafal')->nullable();
            $table->text('santri_alamat')->nullable();
            $table->text('santri_ket')->nullable();
            $table->integer('kelas_id')->nullable();
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
        Schema::dropIfExists('santri_tb');
    }
}
