<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Contato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        

        //dd($request);

        /*pre = organizar array
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';*/

        /*input vai trazer o valor que tem no nome
        echo $request->input('nome');*/

        /*$contato = new Contato;
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');*/

        /* verificando $contato
        echo '<pre>';
        print_r($contato->getAttributes());
        echo '</pre>';*/

        //salvando...
        //$contato->save();

        //implementando todos os atributos atraves do create
        
        /*$contato = Contato::create($request->all());
        //print_r($contato->getAttributes());
        $contato->save();*/
       
        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['titulo'=>'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //Realizar a validação dos dados do formulário recebidos pelo request antes de salvar
        $request->validate([
            'nome' => 'required |min:3 |max:40',
           'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required| max:2000',
        ]);


    }
}
