
@if(isset($produto->id))
    {{--mandando para a rota update --}}
    <form method="post" action="{{ route("produto.update", ["produto" => $produto->id])}}">
        @method("PUT")
        @csrf

@else
    {{--mandando para a rota adicionar --}}
    <form method="post" action="{{ route("produto.store")}}">
        @csrf

@endif
        <div style="color:red;"> {{-- has verifica se tem erros relacionado a nomes --}}
            {{ $errors->has("nome") ? $errors->first("nome") : ""}}
        </div>
        <input type="text" name="nome" value="{{ $produto->nome ?? old("nome") }}" placeholder="Nome" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a descricao --}}
            {{ $errors->has("descricao") ? $errors->first("descricao") : ""}}
        </div>
        <input type="text" name="descricao" value="{{ $produto->descricao ?? old("descricao") }}" placeholder="Descrição" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a peso --}}
            {{ $errors->has("peso") ? $errors->first("peso") : ""}}
        </div>
        <input type="text" name="peso" value="{{ $produto->peso ?? old("peso") }}" placeholder="Peso" class="borda-preta">

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a unidade_id --}}
            {{ $errors->has("unidade_id") ? $errors->first("unidade_id") : ""}}
        </div>
        <select name="unidade_id">
            <option> -- Selecione a Unidade </option>
            @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old("unidade_id")) == $unidade->id ? "selected" : ""}}> {{$unidade->descricao}} </option>
            @endforeach

        </select>

        <button type="submit" class="borda-preta">Enviar</button>
    </form>


