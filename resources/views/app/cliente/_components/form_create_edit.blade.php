
@if(isset($cliente->id))
    {{--mandando para a rota update --}}
    <form method="post" action="{{ route("cliente.update", ["cliente" => $cliente->id])}}">
        @method("PUT")
        @csrf

@else
    {{--mandando para a rota adicionar --}}
    <form method="post" action="{{ route("cliente.store")}}">
        @csrf
@endif
        
        <div style="color:red;"> {{-- has verifica se tem erros relacionado a nomes --}}
            {{ $errors->has("nome") ? $errors->first("nome") : ""}}
        </div>
        <input type="text" name="nome" value="{{ $cliente->nome ?? old("nome") }}" placeholder="Nome" class="borda-preta">

        <button type="submit" class="borda-preta">Enviar</button>
    </form>


