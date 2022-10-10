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
        Schema::create('identificacion_cuenta_mayors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuenta_mayor_id');
            $table->unsignedBigInteger('calculo_cuenta_mayor_id');
           
            $table->foreign('cuenta_mayor_id')->references('id')->on('cuenta_mayors');
            $table->foreign('calculo_cuenta_mayor_id')->references('id')->on('calculo_cuenta_mayors');
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
        Schema::dropIfExists('identificacion_cuenta_mayors');
    }
};
