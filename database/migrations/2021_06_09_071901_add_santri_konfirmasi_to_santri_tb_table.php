<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSantriKonfirmasiToSantriTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santri_tb', function (Blueprint $table) {
            $table->enum('santri_konfirmasi', ['belum', 'sudah'])->after('user_id')->default('belum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('santri_tb', function (Blueprint $table) {
            $table->dropColumn('santri_konfirmasi');
        });
    }
}
