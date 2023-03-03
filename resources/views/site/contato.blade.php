{{--TEMPLATE--}}
@extends('site.layouts.basico')
{{--TITÚLO--}}
@section('titulo',$titulo)
{{-- CORPO --}}
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato',['classe'=>'borda-preta'])
                    <p>A nossa equipe analizará a sua mensagem e retornaremos o mais brevemente possível! </p>
                    <p>Nosso tempo médio de resposta é em torno de 48horas.
                @endcomponent
            </div>
        </div>
    </div>
    
@endsection
