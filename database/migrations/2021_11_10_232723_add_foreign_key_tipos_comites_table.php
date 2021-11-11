<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposComitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('codigos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_comite')->unsigned();
            $table->foreign('id_comite')->references('id')->on('comites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comites', function (Blueprint $table) {
            //
        });
    }
}
