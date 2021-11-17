<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Zpruebas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->datetime('datetime');
            $table->dateTimeTz('dateTimeTz');
            $table->date('date');

            $table->time('time');
            //$table->timestampTz('timestampTz');
            $table->timestamp('timestamp');
            //$table->timestampsTz('timestampsTz');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
