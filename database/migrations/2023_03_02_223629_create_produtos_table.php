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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',100);
            $table->text('descricao')->nullable();//permite que o campo seja nulo
            $table->integer('peso')->nullable();
            $table->float('preco_venda',8,2)->default(0.01);//fica com o valor default(0.01) caso nao seja colocado nenhum valor
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
