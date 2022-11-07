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
        Schema::create('periodo_cuenta_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuenta_mayor_id');
            $table->unsignedBigInteger('periodo_id');
            $table->decimal('total', $precision = 20, $scale = 2)->nullable();
            $table->foreign('cuenta_mayor_id')->references('id')->on('cuenta_mayors');
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
        Schema::dropIfExists('periodo_cuenta_m_s');
    }
};
