@extends('layouts.main')
@section('title', 'Editando: '.$jogo->titulo)
@section('content')


    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{$jogo->titulo}}</h1>
        {{-- necessario para enviar arquivos por formulario html --}}
        <form action="/jogos/update/{{$jogo->id}}" method="POST" enctype="multipart/form-data">
            {{-- diretiva do laravel necessária para enviar o formulário e gravar no banco --}}
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="imagem">Imagem do Jogo: </label>
                <input type="file" class="form-control-file" id="imagem" name="imagem" >
                <img src="/img/jogos/{{$jogo->imagem}}" alt="{{$jogo->titulo}}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Jogo: </label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do jogo" value="{{$jogo->titulo}}">
            </div>
           
            <div class="form-group">
                <label for="title">Gênero: </label>
                <input type="text" class="form-control" id="genero" name="genero" placeholder="Gênero do jogo" value="{{$jogo->genero}}">
            </div>            
            
            <div class="form-group">
                <label for="title">Em quais plataformas existe versão: </label>
                <div class="form-group">
                    
                    <input type="checkbox" name="plataforma[]" value="Playstation"> 
                    <ion-icon name="logo-playstation"></ion-icon> Playstation
                </div>
                <div class="form-group">
                    <input type="checkbox" name="plataforma[]" value="Xbox">
                    <ion-icon name="logo-xbox"></ion-icon> Xbox
                </div>
                <div class="form-group">
                    <input type="checkbox" name="plataforma[]" value="Switch"> 
                    <ion-icon name="game-controller"></ion-icon> Switch
                </div>
                <div class="form-group">
                    <input type="checkbox" name="plataforma[]" value="PC"> 
                    <ion-icon name="desktop"></ion-icon> PC
                </div>
                <div class="form-group">
                    <input type="checkbox" name="plataforma[]" value="Android"> 
                    <ion-icon name="logo-google-playstore"></ion-icon> Android
                </div>
            </div>
            <div class="form-group">
                <label for="title">Preço: </label>
                <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="0.010" type="text" class="form-control" id="preco" name="preco" placeholder="Informe o valor do jogo" value="{{$jogo->preco}}">
            </div> 
            <input type="submit" class="btn btn-primary" value="Editar jogo">
        </form>
    </div>

@endsection
