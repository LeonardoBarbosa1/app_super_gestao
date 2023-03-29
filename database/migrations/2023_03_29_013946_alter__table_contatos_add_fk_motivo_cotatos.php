<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        //selecionando a tabela contatos para alteração, criando nova coluna motivo_contatos_id
        Schema::table('contatos', function (Blueprint $table) { 
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //migrar dados de motivo_contatos para motivo_contatos_id
        DB::statement('update contatos set motivo_contatos_id = motivo_contato');

        //criando FK  remover a coluna motivo_contato da tabela contatos
        Schema::table('contatos', function (Blueprint $table) { 
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar coluna motivo_contato e removendo FK
        Schema::table('contatos', function (Blueprint $table) { 
            $table->integer('motivo_contato', 10);
            $table->dropForeign('contatos_motivo_contatos_id_foreign');
            
        });

        //atribuir motivo_contato_id para a coluna motivo_contato
        DB::statement('update contatos set motivo_contato = motivo_contatos_id ');

        Schema::table('contatos', function (Blueprint $table) { 
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
