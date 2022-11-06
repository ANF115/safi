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
        Schema::table('periodos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('catalogo_id')->after('fecha_fin');
            $table->foreign('catalogo_id')->references('id')->on('catalogos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periodos', function (Blueprint $table) {
            //
            $table->dropColumn('catalogo_id');
        });
    }
};
