<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::disableForeignKeyConstraints();
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 100);
            $table->string('numero', 10);
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 100);
            $table->foreignId('imovel_id')->constrained('imoveis')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
//        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
