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
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('codigo');
            $table->double('costo');
            $table->boolean('ganadora');
            $table->timestamp('cuando_se_vendio');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->nullable();

            $table->unsignedBigInteger('sorteo_id');
                
            $table->foreign('sorteo_id')
                    ->references('id')
                    ->on('sorteos')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('boletas');
    }
};
