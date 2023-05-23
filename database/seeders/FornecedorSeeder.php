<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1º Forma de adicionar registros, instanciando objetos
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'PE';
        $fornecedor->email = 'contato@fornecedor100.com';

        $fornecedor->save();
        
        //2º Forma de adicionar registros
        //ATENÇÂO no atributo fillable da classe fornecedor em models
        Fornecedor::create([
            'nome'=>'fornecedor 200',
            'site'=>'fornecedor200.com.br',
            'uf'=>'CE',
            'email'=>'contato@fornecedor200.com'
        ]);

        //3º Forma de adicionar registros
        //insert, NÃO PASSA PELO TRATAMENTO DO ELOQUENT
        DB::table('fornecedores')->insert([
            'nome'=>'fornecedor 300',
            'site'=>'fornecedor300.com.br',
            'uf'=>'SP',
            'email'=>'contato@fornecedor300.com'
        ]);
        
        //criando mais 1000 registros no banco, mas é preciso colocar os tipos em Factories
        \App\Models\Fornecedor::factory()->count(500)->create();
    }
}
