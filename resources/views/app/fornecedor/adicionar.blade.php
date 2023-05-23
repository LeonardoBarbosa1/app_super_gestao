@extends('app.layouts.basico')
{{--TITÚLO--}}
@section('titulo',"Fornecedor")
{{-- CORPO --}}
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p> Fornecedor - {{$titulo}}</p>
        </div>

          <div class="menu">
                <ul>
                    <li>  <a href="{{ route("app.fornecedor.adicionar")}}"> Novo </a>  </li>
                    <li>  <a href="{{ route("app.fornecedor")}}"> Consulta </a>  </li>
                </ul>
        </div>

         <div class="informacao-pagina" >
            

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                
                    <div 
                        @if($msg == "Atualização realizada com sucesso" )
                            class="msg-fornecedor"
                        @endif 

                         @if($msg == "Cadastro realizado com sucesso" )
                            class="msg-fornecedor"
                        @endif   
                                             
                        @if($msg == "Erro ao Atualizar")
                            class="msg-fornecedor-error"
                        @endif 
                        
                        id="mensagem-sucesso" >   {{-- Mensagem caso o cadastro seja realizado com sucesso --}}
                            {{ $msg ?? ""}}
                    </div>
        
                {{-- deixando mensagens por 4 segundos --}}
                @push('scripts')
                    <script>
                    setTimeout(function() {
                        document.getElementById('mensagem-sucesso').style.opacity = '0';
                    }, 4000);
                    </script>
                @endpush
                                            {{--mandando para a rota adicionar --}}
                <form method="post" action="{{ route("app.fornecedor.adicionar")}}">
                @csrf
                    {{-- Este bloco de código está aqui, pois vai trazer os dados do ID indicado caso tenha... 
                    Estou aproveitando este formulário para a página de edição também! --}}
                        <input type="hidden" name="id" value="{{$fornecedor->id ?? ""}}">
                    {{--                                                                 --}}    

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a nomes --}}
                        {{ $errors->has("nome") ? $errors->first("nome") : ""}}
                    </div>                                   {{--caso o $fornecedor esteja definido, será impressono campo nome --}}
                        <input type="text" name="nome" value="{{ $fornecedor->nome ?? old("nome")}}" placeholder="Nome" class="borda-preta">

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a site --}}
                    {{ $errors->has("site") ? $errors->first("site") : ""}}
                    </div>    
                        <input type="text" name="site" value="{{ $fornecedor->site ?? old("site")}}" placeholder="Site" class="borda-preta">

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a uf --}}
                    {{ $errors->has("uf") ? $errors->first("uf") : ""}}
                    </div>    
                        <input type="text" name="uf" value="{{ $fornecedor->uf ?? old("uf")}}" placeholder="UF" class="borda-preta">

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a emails --}}
                        {{ $errors->has("email") ? $errors->first("email") : ""}}       
                    </div>   
                        <input type="text" name="email" value="{{ $fornecedor->email ?? old("email")}}" placeholder="E-mail" class="borda-preta">

                    <button type="submit" class="borda-preta">{{ $botao }}</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection