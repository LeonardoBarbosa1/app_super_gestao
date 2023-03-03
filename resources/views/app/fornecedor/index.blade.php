<h3>Fornecedor</h3>

{{-- Comentário no Blade --}}

@php
//iniciando php




//finalizando php
@endphp


{{--Fornecedor: {{ $fornecedor[0]['nome']}}
<br>
Status: {{ $fornecedor[0]['status']}}
<br>--}}

@isset($fornecedor)
    @foreach ($fornecedor as $item => $fornecedores)
        Fornecedor: {{ $fornecedores['nome']}}
        <br>
        Status: {{ $fornecedores['status']}}
        <br>
        CNPJ: {{$fornecedores['cnpj'] ?? 'Dado não informado'}}
        <br>
        Telefone: ({{$fornecedores['ddd'] ?? ''}}){{$fornecedores['telefone'] ?? ''}}
        <hr>
    @endforeach

    {{--
    @php
    $i = 0;
    @endphp
    @while (isset($fornecedor[$i]))
    
        Fornecedor: {{ $fornecedor[$i]['nome']}}
        <br>
        Status: {{ $fornecedor[$i]['status']}}
        <br>
        CNPJ: {{$fornecedor[$i]['cnpj'] ?? 'Dado não informado'}}
        <br>
        Telefone: ({{$fornecedor[$i]['ddd'] ?? ''}}){{$fornecedor[$i]['telefone'] ?? ''}}
        <hr>
        @php
            $i++
        @endphp
    @endwhile
    @for ($i = 0; isset($fornecedor[$i]); $i++)
        Fornecedor: {{ $fornecedor[$i]['nome']}}
        <br>
        Status: {{ $fornecedor[$i]['status']}}
        <br>
        CNPJ: {{$fornecedor[$i]['cnpj'] ?? 'Dado não informado'}}
        <br>
        Telefone: ({{$fornecedor[$i]['ddd'] ?? ''}}){{$fornecedor[$i]['telefone'] ?? ''}}
        <hr>
    @endfor
    
    @switch($fornecedor[1]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('81')
            Caruaru - PE
            
            @break

        @case('85')
            Fortaleza - CE
            @break
        @default

            
    @endswitch--}}
@endisset