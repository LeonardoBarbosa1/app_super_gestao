<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    
        public function index(){
            return view("app.fornecedor.index");
        }

        public function listar(Request $request){

            $fornecedores = Fornecedor::with("produtos")->where("nome", "like", "%".$request->input("nome")."%")
                            ->where("site", "like", "%".$request->input("site")."%")
                            ->where("uf", "like", "%".$request->input("uf")."%")
                            ->where("email", "like", "%".$request->input("email")."%")
                            ->paginate(5);
            
            return view("app.fornecedor.listar", ["fornecedores" => $fornecedores, "request" => $request->all() ]);
        }

        public function adicionar(Request $request){
           
            $msg = "";
            //verificando se o token do formulário esta vazio
            //Inclusão
            if($request->input("_token")  != "" && $request->input("id") == ""){

               
                //validação
                $regras = [
                    "nome" => "required | min:3| max:40",
                    "site" => "required",
                    "uf" => "required |min:2|max:2",
                    "email" => "email"
                ];

                $feedback = [
                    "required" => "O campo :attribute ser preenchido!",
                    "nome.min" => "O campo Nome deve ter no mínimo 3 caracteres",
                    "nome.max" => "O campo Nome deve ter no máximo 40 caracteres",
                    "uf.min" => "O campo UF deve ter no mínimo 2 caracteres",
                    "uf.max" => "O campo UF deve ter no máximo 2 caracteres",
                    "email.email" => "O email informado não é válido"

                ];
                //aplicando validação
                $request->validate($regras,$feedback);

                //salvando dados
                $fornecedor = new Fornecedor();
                $fornecedor::create($request->all());

                //redirect


                //dados para view caso cadastro seja realizado
                $msg = "Cadastro realizado com sucesso";
               
            }

            //Edição
            if($request->input("_token")  != "" && $request->input("id") != ""){
                
                $fornecedor = Fornecedor::find($request->input("id"));
                $update = $fornecedor->update($request->all());

                
                if($update){
                    $msg = "Atualização realizada com sucesso";
                } else{
                    $msg = "Erro ao Atualizar";
                }

                return redirect()->route("app.fornecedor.editar", [
                    "id" => $request->input("id"),
                    "msg" => $msg,
                    "titulo" => "Editar"
                    
                   
                ]);

                
            }

            return view("app.fornecedor.adicionar", [
                "msg" => $msg,
                "titulo" => "Adicionar",
                "botao" => "Adicionar",
                
               
            ]);
        }

    

        public function editar(Request $request,$id, $msg = ""){
            
            $fornecedor = Fornecedor::find($id);
            return view("app.fornecedor.adicionar", [
                "fornecedor" => $fornecedor,
                "titulo" => "Editar",
                "botao" => "Atualizar",
                "msg" => $msg
            ]);
        }

        public function excluir(Request $request, $id, $msg = ""){
            
            $model = Fornecedor::find($id);
            $nome = $model->nome;
            
            $msg = "Forcenecedor $nome excluído com sucesso!";

            Fornecedor::find($id)->delete();
            return view("app.fornecedor.index", ["msg" => $msg]);
        }

}
