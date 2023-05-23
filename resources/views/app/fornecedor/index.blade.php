@extends('app.layouts.basico')
{{--TITÚLO--}}
@section('titulo',"Fornecedor")
{{-- CORPO --}}
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p> Fornecedor</p>
        </div>

        <div class="menu">
                <ul>
                    <li>  <a href="{{ route("app.fornecedor.adicionar")}}"> Novo </a>  </li>
                    <li>  <a href="{{ route("app.fornecedor")}}"> Consulta </a>  </li>
                </ul>
        </div>


         

         <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto;margin-right: auto;">

                <div 
                    class="msg-fornecedor-error"
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
                <form method="post" action="{{ route("app.fornecedor.listar")}}">
                @csrf
                    <h2>Consultar</h2>
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection