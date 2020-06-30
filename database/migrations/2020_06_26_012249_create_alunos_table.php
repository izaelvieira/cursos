<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('senha');
            $table->string('matricula')->default(NULL);
            $table->string('foto')->default(NULL);
            $table->string('endereco')->default(NULL);
            $table->string('numero')->default(NULL);
            $table->string('complemento')->default(NULL);
            $table->string('bairro')->default(NULL);
            $table->string('cidade')->default(NULL);
            $table->string('estado')->default(NULL);
            $table->string('cep')->default(NULL);
            $table->boolean('ativo')->default('1');
            $table->rememberToken();
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

        Schema::dropIfExists('alunos');
    }
}
