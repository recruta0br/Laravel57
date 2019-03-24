<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosPrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros_prestamo', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_livroprestamo_usuario')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('livro_id');
            $table->foreign('livro_id', 'fk_livroprestamo_livro')->references('id')->on('livros')->onDelete('restrict')->onUpdate('restrict');
            $table->date('data_emp');
            $table->string('emprestado_a', 100);
            $table->boolean('estado');
            $table->date('data_dev');
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
        Schema::dropIfExists('livros_prestamo');
    }
}
