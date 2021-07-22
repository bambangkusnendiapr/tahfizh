<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasWarnaToKelasTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelas_tb', function (Blueprint $table) {
            $table->string('kelas_warna')->after('kelas_ket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelas_tb', function (Blueprint $table) {
            $table->dropColumn('kelas_warna');
        });
    }
}
