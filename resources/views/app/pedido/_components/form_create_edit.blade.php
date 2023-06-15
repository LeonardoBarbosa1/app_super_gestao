
@if(isset($pedido->id))
    {{--mandando para a rota update --}}
    <form method="post" action="{{ route("pedido.update", ["pedido" => $pedido->id])}}">
        @method("PUT")
        @csrf

@else
    {{--mandando para a rota adicionar --}}
    <form method="post" action="{{ route("pedido.store")}}">
        @csrf
@endif
        

        <div style="color:red;"> {{-- has verifica se tem erros relacionado a cliente_id --}}
            {{ $errors->has("cliente_id") ? $errors->first("cliente_id") : ""}}
        </div>
        <select name="cliente_id">
            <option> -- Selecione o Cliente </option>
            @foreach ($clientes as $cliente)
            <option  value="{{$cliente->id}}" {{ ($cliente->cliente_id ?? old("cliente_id")) == $cliente->id ? "selected" : ""}}> {{$cliente->nome}} </option>
            @endforeach
        </select>

        <button type="submit" class="borda-preta">Enviar</button>
    </form>


