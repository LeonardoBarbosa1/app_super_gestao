{{--TEMPLATE--}}
@extends('site.layouts.basico')
@section('titulo',$titulo)
{{-- CORPO --}}
@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
        <div class="form-login">
            <form action={{ route('site.login')}} method="post">
                @csrf
                <div style="color: red;">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                 </div>
                <input name="usuario" value="{{ old("usuario")}}" type="text" placeholder="Usuário" class="borda-preta">
               
                <div style="color: red;">
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                </div>    
                <input name="senha" value="{{ old("senha")}}" type="password" placeholder="Senha" class="borda-preta" >
                

                <button type="submit" class="borda-preta" >Acessar</button>
            </form>
             <div style="color: red;">
                {{isset($erro) && $erro != "" ? $erro : "" }}
            </div>
        </div>    
        </div>
    </div>

    
    
@endsection
