<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('genero')->onDelete('cascade');
            $table->integer('editora_id')->unsigned();
            $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade');
            $table->string('titulo');
            $table->integer('ano_de_lancamento');
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
        Schema::dropIfExists('livros');
    }
}
