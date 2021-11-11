<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposExpositoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dtlles_actividad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_expositor')->unsigned();
            $table->foreign('id_expositor')->references('id')->on('expositores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expositores', function (Blueprint $table) {
            //
        });
    }
}
