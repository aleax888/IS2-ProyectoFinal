<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('inscripciones', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->bigInteger('id_actividad')->unsigned();
        //     $table->foreign('id_actividad')->references('id')->on('actividades');
        // });

        Schema::table('materiales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_actividad')->unsigned();
            $table->foreign('id_actividad')->references('id')->on('actividades');
        });
        
        Schema::table('asistencias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_actividades')->unsigned();
            $table->foreign('id_actividades')->references('id')->on('actividades');
        });

        Schema::table('actividades_paquetes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_actividades')->unsigned();
            $table->foreign('id_actividades')->references('id')->on('actividades');
        });

        Schema::table('dtlles_actividad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_actividades')->unsigned();
            $table->foreign('id_actividades')->references('id')->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividades', function (Blueprint $table) {
            //
        });
    }
}
