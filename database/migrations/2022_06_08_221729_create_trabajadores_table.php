<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');          
            $table->string('imagen')->nullable;
            $table->string('curriculum')->nullable();
            $table->bigInteger('rut_trabajador');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->date('fecha_ingreso')->nullable;       
            $table->integer('sueldo');
            $table->string('cargo');
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
        Schema::dropIfExists('trabajadores');
    }
}
