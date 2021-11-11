<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_paquete')->unsigned();
            $table->foreign('id_paquete')->references('id')->on('paquetes');
        });

        Schema::table('preinscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_paquete')->unsigned();
            $table->foreign('id_paquete')->references('id')->on('paquetes');
        });

        Schema::table('actividades_paquetes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_paquete')->unsigned();
            $table->foreign('id_paquete')->references('id')->on('paquetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paquetes', function (Blueprint $table) {
            //
        });
    }
}
