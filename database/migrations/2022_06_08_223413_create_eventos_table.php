<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->bigInteger('id_trabajador')->unsigned();
            $table->foreign('id_trabajador')->references('id')->on('trabajadores')->onDelete("cascade");
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('precio');
            $table->timestamps();
            $table->bigInteger('id_empresas')->unsigned();
            $table->foreign('id_empresas')->references('id')->on('empresas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
