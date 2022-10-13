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
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('numero');
            $table->date('ini');
            $table->date('fin');
            $table->double('valor_ganable');
            $table->boolean('activa');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorteos');
    }
};
