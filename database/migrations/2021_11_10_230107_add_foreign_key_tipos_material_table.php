<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTiposMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materiales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_tipo_material')->unsigned();
            $table->foreign('id_tipo_material')->references('id')->on('tipos_material')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiposMaterial', function (Blueprint $table) {
            //
        });
    }
}
