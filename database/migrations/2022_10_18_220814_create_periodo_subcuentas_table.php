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
        Schema::create('periodo_subcuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcuenta_id');
            $table->unsignedBigInteger('periodo_id');
            $table->decimal('valor');
            $table->foreign('subcuenta_id')->references('id')->on('sub_cuentas');
            $table->foreign('periodo_id')->references('id')->on('periodos');
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
        Schema::dropIfExists('periodo_subcuentas');
    }
};
