<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroAutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_autor', function (Blueprint $table) {
            $table->integer('livro_id')->unsigned()->index();
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
            $table->integer('autor_id')->unsigned()->index();
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_autor');
    }
}
