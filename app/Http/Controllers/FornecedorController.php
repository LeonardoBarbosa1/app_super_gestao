<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedor = [
            0 => [
                'nome' => 'Fornecedores = 1',
                'status'=>'N',
                'cnpj' => '000-000-000/00-00',
                'ddd' => '85', //Fortaleza(CE)
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedores = 2',
                'status'=>'S',
                'cnpj' => null,
                'ddd' => '81', //Caruaru(PE)
                'telefone' => '0000-0000'
            ],  
            2 => [
                'nome' => 'Fornecedores = 3',
                'status'=>'S',
                'cnpj' => null,
                'ddd' => '11', //São Paulo(SP)
                'telefone' => '0000-0000'
                ]
        ];

        echo isset($fornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ Não informado';
        return view('app.fornecedor.index', compact('fornecedor'));
    }
}
