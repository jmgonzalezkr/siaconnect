<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestors', function (Blueprint $table) {
            $table->id('id');
            $table->string('titulo');
            $table->string('descripcion')->nullable();
            $table->string('autor')->nullable();
            $table->string('categoria');
            $table->string('area');
            $table->text('ruta');
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
        Schema::dropIfExists('gestors');
    }
}
