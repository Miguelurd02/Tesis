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
        Schema::create('imageness', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_foto');

            $table->unsignedBigInteger('propiedad_id')->unique();

            $table->foreign('propiedad_id')
            ->references('id')
            ->on('propiedades')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('imageness');
    }
};
