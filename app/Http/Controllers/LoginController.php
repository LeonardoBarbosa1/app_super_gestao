<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    public function index(Request $request){

        $erro = "";
        if($request->get("erro") == 1){
            $erro = "Email ou senha inválido";
        } 

        if($request->get("erro") == 2){
            $erro = "É necessário fazer o login para acessar!";
        }

        return view('site.login',[
            'titulo'=>'Login', 
            "erro" => $erro,
        ]);
    }

    public function autenticar(Request $request){
       
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Mensagem de validação
        $feedback = [
            'usuario.email' => 'O e-mail informado não é válido',
            'senha.required' => 'O campo (senha) precisa ser preenchido',
        ];    

        $request->validate($regras, $feedback);

        // Recuperando os parâmetros do login
        $email = $request->get("usuario");
        $password = $request->get("senha");

        

        $user = new User();

        $usuario = $user->where("email", $email)
            ->where("password", $password)
            ->get()
            ->first();

        if(isset($usuario->name)){
            
            //iniciando sessão
            session_start();

            $_SESSION["nome"] = $usuario->name;
            $_SESSION["email"] = $usuario->email;

            return redirect()->route("app.home");
           
        } else{
            return redirect()->route('site.login', ["erro" => 1]);
        }

        
    }

    public function sair(){

        session_destroy();
        return redirect()->route("site.login");
    }

}
