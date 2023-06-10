
@if(isset($produto_detalhe->id))
    {{--mandando para a rota update --}}
    <form method="post" action="{{ route("produto-detalhe.update", ["produto_detalhe" => $produto_detalhe->id])}}">
        @method("PUT")
        @csrf

@else
    {{--mandando para a rota adicionar --}}
    <form method="post" action="{{ route("produto-detalhe.store")}}">
        @csrf

@endif
        <div style="color:red;"> {{-- has verifica se tem erros relacionado a nomes --}}
            {{ $errors->has("produto_id") ? $errors->first("produto_id") : ""}}
        </div>
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old("produto_id") }}" placeholder="ID do Produto" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a nomes --}}
            {{ $errors->has("comprimento") ? $errors->first("comprimento") : ""}}
        </div>
        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old("comprimento") }}" placeholder="Comprimento" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a descricao --}}
            {{ $errors->has("largura") ? $errors->first("largura") : ""}}
        </div>
        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old("largura") }}" placeholder="Largura" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a peso --}}
            {{ $errors->has("altura") ? $errors->first("altura") : ""}}
        </div>
        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old("altura") }}" placeholder="Altura" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a unidade_id --}}
            {{ $errors->has("unidade_id") ? $errors->first("unidade_id") : ""}}
        </div>
        <select name="unidade_id">
            <option> -- Selecione a Unidade </option>
            @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old("unidade_id")) == $unidade->id ? "selected" : ""}}> {{$unidade->descricao}} </option>
            @endforeach

        </select>

        <button type="submit" class="borda-preta">Enviar</button>
    </form>


