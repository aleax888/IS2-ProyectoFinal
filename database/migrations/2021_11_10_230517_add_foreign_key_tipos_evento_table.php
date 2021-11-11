<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_tipo_evento')->unsigned();
            $table->foreign('id_tipo_evento')->references('id')->on('tipos_evento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos_evento', function (Blueprint $table) {
            //
        });
    }
}
