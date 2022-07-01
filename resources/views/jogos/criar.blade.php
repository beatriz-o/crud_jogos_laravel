@extends('layouts.main')
@section('title', 'Publicar Jogo')
@section('content')
<link rel="stylesheet" type="text/css"  href="/css/style_criar.css" />


    <div id="jogo-create-container" class="col-md-6 offset-md-3" >
        <h1>Publique seu jogo</h1>
        {{-- necessario para enviar arquivos por formulario html --}}
        <form action="/jogos" method="POST" enctype="multipart/form-data">
            {{-- diretiva do laravel necessária para enviar o formulário e gravar no banco --}}
            @csrf
            <div class="form-group">
                <label for="imagem">Escolha uma imagem: </label>
                <input type="file" class="form-control-file" onchange="readImage();" id="imagem" name="imagem" >
                <img src="" id="foto" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Título: </label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do Game">
            </div>
            <div class="form-group">
                <label for="title">Gênero: </label>
                <input type="text" class="form-control" id="genero" name="genero" placeholder="Ação, aventura, RPG, esporte...">
            </div>
            <div class="form-group">
                <label for="title">Plataformas que o jogo está disponível: </label>
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
                <label for="title">Preco: </label>
                <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="0.010" class="form-control" id="preco" name="preco" placeholder="Informe o valor do jogo">
            </div>
            
            <input type="submit" class="btn btn-dark" value="Publicar jogo">
        </form>
    </div>

@endsection
