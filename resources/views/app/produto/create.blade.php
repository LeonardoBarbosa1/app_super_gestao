@extends('app.layouts.basico')
{{--TITÚLO--}}
@section('titulo',"Produto")
{{-- CORPO --}}
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>  {{$titulo}} Produto</p>
        </div>

          <div class="menu">
                <ul>
                    <li>  <a href="{{ route("produto.index")}}"> Voltar </a>  </li>
                    <li>  <a href="{{ route("app.fornecedor")}}"> Consulta </a>  </li>
                </ul>
        </div>

         <div class="informacao-pagina" >
            

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                
                    {{-- <div 
                        @if($msg == "Atualização realizada com sucesso" )
                            class="msg-fornecedor"
                        @endif 

                         @if($msg == "Cadastro realizado com sucesso" )
                            class="msg-fornecedor"
                        @endif   
                                             
                        @if($msg == "Erro ao Atualizar")
                            class="msg-fornecedor-error"
                        @endif 
                        
                        id="mensagem-sucesso" >   {{-- Mensagem caso o cadastro seja realizado com sucesso 
                            {{ $msg ?? ""}}
                    </div> --}}
        
                {{-- deixando mensagens por 4 segundos --}}
                {{-- @push('scripts')
                    <script>
                    setTimeout(function() {
                        document.getElementById('mensagem-sucesso').style.opacity = '0';
                    }, 4000);
                    </script>
                @endpush --}}
                                            {{--mandando para a rota adicionar --}}
                <form method="post" action="{{ route("produto.store")}}">
                @csrf
                   

                     <div style="color:red;">   {{-- has verifica se tem erros relacionado a nomes --}}
                        {{ $errors->has("nome") ? $errors->first("nome") : ""}}
                    </div>                                
                    <input type="text" name="nome" value="{{ old("nome") }}" placeholder="Nome" class="borda-preta">

                     <div style="color:red;">   {{-- has verifica se tem erros relacionado a descricao --}}
                        {{ $errors->has("descricao") ? $errors->first("descricao") : ""}}
                    </div>
                    <input type="text" name="descricao" value="{{ old("descricao") }}" placeholder="Descrição" class="borda-preta">

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a peso --}}
                        {{ $errors->has("peso") ? $errors->first("peso") : ""}}
                    </div>
                   <input type="text" name="peso" value="{{ old("peso") }}" placeholder="Peso" class="borda-preta">

                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a unidade_id --}}
                        {{ $errors->has("unidade_id") ? $errors->first("unidade_id") : ""}}
                    </div>
                    <select name="unidade_id">
                        <option> -- Selecione a Unidade </option>
                        @foreach ($unidades as $unidade)        
                            <option value="{{$unidade->id}}" {{ old("unidade_id") == $unidade->id ? "selected" : ""}}> {{$unidade->descricao}} </option>
                        @endforeach
                        
                    </select>

                    <button type="submit" class="borda-preta">{{ $botao }}</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection