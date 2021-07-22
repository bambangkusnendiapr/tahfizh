<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSantriOrtuToSantriTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santri_tb', function (Blueprint $table) {
            $table->string('santri_ortu')->after('santri_konfirmasi')->nullable();
            $table->string('santri_ortu_hubungan')->after('santri_ortu')->nullable();
            $table->string('santri_ortu_no')->after('santri_ortu_hubungan')->nullable();
            $table->string('santri_ortu_alamat')->after('santri_ortu_no')->nullable();
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
            $table->dropColumn('santri_ortu');
            $table->dropColumn('santri_ortu_hubungan');
            $table->dropColumn('santri_ortu_no');
            $table->dropColumn('santri_ortu_alamat');
        });
    }
}
