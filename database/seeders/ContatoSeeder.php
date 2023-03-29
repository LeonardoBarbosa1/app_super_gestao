<?php

namespace Database\Seeders;

use App\Models\Contato;
use Carbon\Factory;
use Database\Factories\ContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Contato::create([
            'nome'=>'Leonardo',
            'telefone'=>'(81) 9 9300-9285',
            'email'=>'LeonardoTeste@gmail.com',
            'motivo_contato'=>1,
            'mensagem'=>'Teste seeder'
        ]);*/
        \App\Models\Contato::factory()->count(100)->create();
    }
}
