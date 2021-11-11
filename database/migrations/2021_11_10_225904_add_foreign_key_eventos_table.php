<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyEventosTable extends Migration
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
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos');
        });
        
        Schema::table('gastos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos');
        });

        Schema::table('comites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos');
        });

        Schema::table('actividades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos');
        });

        Schema::table('ingresos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            //
        });
    }
}
