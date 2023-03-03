<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        {{--CSS--}}
        <link rel="stylesheet" href="{{asset('css/estilo_basico.css')}}">
    </head>
    <body>
        {{-- MENU --}}
        @include('site.layouts._partials.topo')
        {{-- CONTEÚDO DO CORPO --}}
        @yield('conteudo')
        {{--RODAPÉ--}}
        @include('site.layouts._partials.rodape')
    </body>
</html>