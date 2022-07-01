@extends('layouts.main')
@section('title', 'Jogos')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um jogo</h1>     
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="jogo-container" class="cold-md-12">
    <br>
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else       
        <h2 class="subtitle">Jogos cadastrados</h2>
    @endif    
    <div id="cards-container" class="row">
        @foreach ($jogos as $jogo)
            <div class="card col-md-3">
                <img src="/img/jogos/{{$jogo->imagem}}" alt="{{$jogo->titulo}}">
                <div class="card-body">
                    <h2 class="card-title">{{$jogo->titulo}}</h2>
                    <h5 class="card-title">{{$jogo->genero}}</h5>
                    @php
                    $plataformas='';
                    foreach ($jogo->plataforma as $p){
                        $plataformas = $plataformas.$p.', ';
                         
                    }                   
                         $plataformasf = rtrim($plataformas,', ');
                    @endphp
                    <p class="">{{$plataformasf}}</p>
                    {{-- <h5 class="card-title">{{$jogo->plataforma}}</h5> --}}
                    <h5 class="card-title">{{$jogo->preco}}</h5>
                    <a href="/jogos/{{$jogo->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
           
        @endforeach
        @if (count($jogos)==0 && $search)
            <p>Não foi possível encontrar nenhum jogo com {{$search}}! <a href="/">Ver todos</a></p>
        @elseif(count($jogos)==0)
            <p>Não há jogos disponíveis</p>
        @endif
    </div>
</div>
{{-- <section class="pt-4">
    <div class="container px-lg-5">
<div class="row gx-lg-5">
    <div class="col-lg-6 col-xxl-4 mb-5">
        <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                <h2 class="fs-4 fw-bold">Fresh new layout</h2>
                <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p>
            </div>
        </div>
    </div>
</div>
</div>
</section> --}}

{{-- @foreach($jogos as $jogo)

    <p>{{$jogo->titulo}} -- {{$jogo->descricao}}</p>
@endforeach --}}


@endsection
{{-- <h1>algum titulo</h1>
<img src="/img/banner.jpg" alt="Banner" width="100%">
@if(10>55)
<p>condição verdadeira</p>
@endif
<p>{{$nome}}</p>
@if($nome=="João")
    <p>O nome é João</p>
@elseif ($nome=="Wellinson")
        <p>O nome é {{$nome}}, tem {{$idade}} anos e é {{$profissao}}</p>
@else    
    <p>O nome não é Pedro</p>        
@endif

@for($i = 0; $i < count($arr); $i++)
        <p>{{$arr[$i]}} - {{$i}}</p>
        @if($i == 2)
            <p>O i é 2</p>
        @endif
@endfor

@foreach($nomes as $nome)
    <p>{{$loop->index}}</p>
    <p>{{$nome}}</p>
@endforeach

@php
    $name = "João";
    echo $name;
@endphp
<!--Comentário do HTML-->
Comentário com blade --}}
