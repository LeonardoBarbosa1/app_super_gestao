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
        //criando tabela fillial
        Schema::create('filiais', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando tabela produto_filliais
        Schema::create('produto_filliais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //constrant
            //referencio a chave estrangeira
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

            
        });
        
        //removendo colunas da tabela produtos
        //Schema::table('produtos', function (Blueprint $table){
        //    $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
        //});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->float('preco_venda',8,2)->default(0.01);//fica com o valor default(0.01) caso nao seja colocado nenhum valor
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        //removendo tabela produto_filiais
        Schema::dropIfExists('produto_filiais');

        //removendo tabela filiais
        Schema::dropIfExists('filiais');
    }
};
