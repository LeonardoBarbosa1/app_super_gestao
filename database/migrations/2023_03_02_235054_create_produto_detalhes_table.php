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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id'); //produtos  
            $table->float('comprimento', 8, 
            2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constrant
            //referencio a chave estrangeira
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); //índico que será de Um pra Um

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
