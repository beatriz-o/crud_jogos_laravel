@extends('layouts.main')
@section('title', $jogo->titulo)
@section('content')

    <div class="col-md-12 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-8">
                <h1>{{ $jogo->titulo }}</h1>
                <img src="/img/jogos/{{ $jogo->imagem }}" class="img-fluid" {{ $jogo->titulo }}>



            </div>






            @if (!$hasUserJoined)
                    <form action="/jogos/join/{{ $jogo->id }}" method="GET">
                        @csrf
                        <a href="/jogos/join/{{ $jogo->id }}" class="btn btn-primary" id="jogo-submit"
                            onclick="jogo.prjogoDefault(); this.closest('form').submit();"> Marcar como Adquirdo </a>
                    </form>
                @else
                    <p class="already-joined-msg">Você já possui este jogo!</p>
                @endif
        </div>

        <br>
    </div>
    <div class="col-md-12 offset-md-1">
        <div class="row">
            <div class="info-container" class="col-md-3">
                <h3>Disponível para: </h3>
                <ul id="items-list">
                    @foreach ($jogo->plataforma as $p)
                        <li>
                            <ion-icon
                                name="@php
                            if($p=='Playstation')
                            echo('logo-playstation');
                            if($p=='Xbox')
                            echo('logo-xbox');
                            if($p=='PC')
                            echo('desktop');
                            if($p=='Switch')
                            echo('game-controller');
                            if($p=='Android')
                            echo('logo-google-playstore');
                        @endphp">
                            </ion-icon><span>{{ $p }}</span>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="info-container" class="col-md-6">
                <p class="jogos-participants">
                    <ion-icon name="people-outline"></ion-icon> {{ count($jogo->users) }} pessoa(s) possuí esse jogo
                </p>
                <p class="jogo-owner">
                    <ion-icon name="person-circle"></ion-icon> {{ $jogoOwner['name'] }}
                </p>
            </div>


        </div>

    </div>

@endsection
