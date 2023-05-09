<?php
$insta = "https://www.instagram.com/dev.barbosa2/";
$linkedin = "https://www.linkedin.com/in/leonardo-barbosa-a9639a21a/"
?>
<div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <a href="{{ $insta }}" target="_blank">
                <img src="{{ asset('img/instagram.png') }}">
            </a>
            <a href="{{ $linkedin }}" target="_blank">
                <img src="{{ asset('img/linkedin.png') }}">
            </a>
           
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(81) 99300-9285</span>
            <br>
            <span>leonardobarbosadossantos44@gmail.com</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>