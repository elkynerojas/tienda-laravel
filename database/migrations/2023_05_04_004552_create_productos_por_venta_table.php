<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_por_venta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad')->default(0);
            $table->float('subtotal')->default(0);
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('producto_id')->references('id')->on('productos')
            ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_por_venta');
    }
};
