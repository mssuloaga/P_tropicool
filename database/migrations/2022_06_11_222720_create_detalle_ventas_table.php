<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_venta')->unsigned();
            $table->foreign('id_venta')->references('id')->on('ventas')->onDelete("cascade");
            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete("cascade");
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
