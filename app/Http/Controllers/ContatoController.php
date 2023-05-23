<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Contato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        
      
       $motivo_contatos = MotivoContato::all();
        return view('site.contato',[
            'titulo'=>'Contato', 
            'motivo_contatos' => $motivo_contatos
            
        ]);
    }

    public function salvar(Request $request){

        
        //Realizar a validação dos dados do formulário recebidos pelo request antes de salvar
        if($request->input("_token") != ""){
        $regras = [
            'nome' => 'required |min:3 |max:40',
           'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required| max:2000',
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',

            'motivo_contatos_id.required' => 'O campo motivo contato precisa ser preenchido',

            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',

            

            'email.email' => 'O email informado não é válido',

            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
        ];
        
        $request->validate($regras, $feedback );

         //dados para view caso cadastro seja realizado

         
    }
    
        //Salva os campos no banco
        Contato::create($request->all());
        //Redirecionando para página inicial,
        
        return redirect()->route('site.index')->with("msg", "Contato enviado com sucesso!");


    }
}
