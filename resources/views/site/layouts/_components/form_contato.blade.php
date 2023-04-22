{{--COLOCANDO PARAMETROS--}}
{{$slot}}


{{-- ENVIANDO FORMULÁRIO --}}
<form action={{ route('site.contato') }} method="post">
    {{-- TOKEN --}}
    @csrf

    <div style="color:red;">   {{-- has verifica se tem erros relacionado a nomes --}}
        @if($errors->has("nome"))
            {{$errors->first("nome")}}
        @endif
    </div>
    <input name="nome" value="{{ old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">  
    <br>

    <div style="color:red;">   
        {{$errors->has("telefone") ? $errors->first("telefone") : "" }}
    </div>
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>

    <div style="color:red;">   
        {{$errors->has("email") ? $errors->first("email") : "" }}
    </div>
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    
    <div style="color:red;">   
        {{$errors->has("motivo_contatos_id") ? $errors->first("motivo_contatos_id") : "" }}
    </div>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}> {{ $motivo_contato->motivo_contato }} </option>
        @endforeach
    </select>
    <br>

    <div style="color:red;">   
         {{$errors->has("mensagem") ? $errors->first("mensagem") : "" }}
    </div>
    <textarea name="mensagem"  class="{{$classe}}"  >
        {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui uma mensagem' }}   
    </textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
@if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
        
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach

    </div>      
@endif