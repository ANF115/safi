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
        Schema::create('identificacion_sub_cuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcuenta_id');
            $table->unsignedBigInteger('calculo_subcuenta_id');
           
            $table->foreign('subcuenta_id')->references('id')->on('sub_cuentas');
            $table->foreign('calculo_subcuenta_id')->references('id')->on('calculo_sub_cuentas');
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
        Schema::dropIfExists('identificacion_sub_cuentas');
    }
};
