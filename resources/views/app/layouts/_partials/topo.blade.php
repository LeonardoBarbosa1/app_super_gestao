
<div class="topo">
        <div class="logo" >
            <a href="{{ route('app.home') }}" >
                <img  src="{{ asset('img/logo.png') }}" >
            </a>    
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.home') }}">Home</a></li>
                <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
                <li><a href="{{ route('pedido.index') }}">Pedido</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
                <li><a href="{{ route('produto.index') }}">Produto</a></li>
                 <li><a href="{{ route('app.sair') }}">Sair</a></li>
            </ul>
        </div>
</div>