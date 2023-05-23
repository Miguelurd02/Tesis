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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('tipo');
            $table->string('dimension');
            $table->integer('banos');
            $table->integer('estacionamiento');
            $table->integer('plantas');
            $table->integer('habitaciones');
            $table->decimal('precio', $presicion = 10, $scale = 2);
            $table->string('contrato');
            $table->string('estado');
            $table->string('imagen');

            $table->unsignedBigInteger('agentes_id');

            $table->foreign('agentes_id')
            ->references('id')
            ->on('agentes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('sector_id');

            $table->foreign('sector_id')
            ->references('id')
            ->on('sector')
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
        Schema::dropIfExists('propiedades');
    }
};
