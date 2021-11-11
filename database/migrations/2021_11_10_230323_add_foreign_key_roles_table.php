<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('roles');
        });

        Schema::table('promociones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
