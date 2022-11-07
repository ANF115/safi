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
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rubro_id');
            $table->unsignedBigInteger('ratio_id');
            $table->string('nombre_referencia');
            $table->float('valor_maximo');
            $table->float('valor_minimo');
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->foreign('ratio_id')->references('id')->on('ratios');
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
        Schema::dropIfExists('referencias');
    }
};
