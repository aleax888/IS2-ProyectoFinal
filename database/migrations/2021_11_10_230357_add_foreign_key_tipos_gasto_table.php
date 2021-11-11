<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposGastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gastos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_tipos_gasto')->unsigned();
            $table->foreign('id_tipos_gasto')->references('id')->on('tipos_gasto');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos_gasto', function (Blueprint $table) {
            //
        });
    }
}
