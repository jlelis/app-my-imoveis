<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->integer('terreno');
            $table->integer('salas');
            $table->integer('banheiros');
            $table->integer('dormitorios');
            $table->integer('garagens');
            $table->text('descricao');
            $table->decimal('preco', 12, 2);
            $table->foreignId('cidade_id')->constrained();
            $table->foreignId('tipo_id')->constrained();
            $table->foreignId('finalidade_id')->constrained();

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
        Schema::dropIfExists('imoveis');
    }
}