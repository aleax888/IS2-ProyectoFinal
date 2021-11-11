<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_tipo_actividad')->unsigned();
            $table->foreign('id_tipo_actividad')->references('id')->on('tipos_actividad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos_actividad', function (Blueprint $table) {
            //
        });
    }
}
