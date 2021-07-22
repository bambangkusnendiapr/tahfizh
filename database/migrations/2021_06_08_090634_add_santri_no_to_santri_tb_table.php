<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSantriNoToSantriTbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santri_tb', function (Blueprint $table) {
            $table->string('santri_no', 20)->after('santri_hafal')->nullable();
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
            $table->dropColumn('santri_no');
        });
    }
}
