 <form method="post" action="{{ route("pedido-produto.store", ["pedido"=>$pedido])}}">
        @csrf
        <div style="color:red;"> {{-- has verifica se tem erros relacionado a produto_id --}}
            {{ $errors->has("produto_id") ? $errors->first("produto_id") : ""}}
        </div>
        <select name="produto_id">
            <option> -- Selecione um Produto </option>
            @foreach ($produtos as $produto)
            <option  value="{{$produto->id}}" {{ (old("produto_id")) == $produto->id ? "selected" : ""}}> {{$produto->nome}} </option>
            @endforeach
        </select>
        <button type="submit" class="borda-preta">Enviar</button>
</form>


