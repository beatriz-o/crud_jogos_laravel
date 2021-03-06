<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--Fonte do Googgle-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" >
        
        <link rel="stylesheet" href="/css/styles.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="/css/styles_itens.css" rel="stylesheet" /> --}}
       <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
          
            <nav class="navbar navbar-expand-lg bg-light">                    
                <div class="container-fluid"> 
                    
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="/">
                      <img src="/img/logo.png" alt="" width="30">
                    </a> 
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link"  href="/">Jogos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/jogos/criar">Criar Jogos</a>
                      </li>
                      @auth
                      <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Meus Jogos</a>
                      </li>
                      <li class="nav-item">
                        <form action="/logout" method="POST">
                          @csrf
                          <a href="/logout" class="nav-link" 
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                            Sair
                          </a>
                        </form>
                      </li>
                      @endauth
                      @guest                          
                      <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar</a>
                      </li>
                      @endguest
                    </ul>
                  </div>
                </div>
              </nav>
        </header>
      <main>
          <div class="container-fluid">
            <div class="row">
              @if (session('msg'))
                  <p class="msg">{{session('msg')}}</p>
              @endif
              @yield('content')
            </div>
          </div>
      </main>    
    </body>
    <footer>
        <p>&copy; 2022</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</html>
