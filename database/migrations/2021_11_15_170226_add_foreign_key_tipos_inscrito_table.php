<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposInscritoTable extends Migration
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
            $table->bigInteger('id_tipo_inscrito')->unsigned();
            $table->foreign('id_tipo_inscrito')->references('id')->on('tipos_inscrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            //
        });
    }
}
