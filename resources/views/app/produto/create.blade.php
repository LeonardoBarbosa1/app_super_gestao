@extends('app.layouts.basico')
{{--TITÚLO--}}
@section('titulo',"Produto")
{{-- CORPO --}}
@section('conteudo')
<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p> Adicionar Produto </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route("produto.index")}}"> Voltar </a> </li>
            <li> <a href=""> Consulta </a> </li>
        </ul>
    </div>

    <div class="informacao-pagina">


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

        @component("app.produto._components.form_create_edit", ["unidades" => $unidades, "fornecedores" => $fornecedores])
            
        @endcomponent
    </div>
</div>
</div>


@endsection
