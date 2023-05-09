<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        {{--CSS--}}
        <link rel="stylesheet" href="{{asset('css/estilo_basico.css')}}">
    </head>
    <body>
        {{-- MENU --}}
        @include('app.layouts._partials.topo')
        {{-- CONTEÚDO DO CORPO --}}
        @yield('conteudo')
       
    </body>
</html>