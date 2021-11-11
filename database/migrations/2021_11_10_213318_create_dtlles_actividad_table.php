<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtllesActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtlles_actividad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtlles_actividad');
    }
}
