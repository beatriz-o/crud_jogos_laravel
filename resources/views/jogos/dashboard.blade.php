@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Jogos que eu publiquei</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($jogos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="col"></th>
                        <th class="col">Nome</th>
                        <th class="col">Gênero</th>
                        <th class="col">Quantos possuem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jogos as $jogo)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/jogos/{{ $jogo->id }}">{{ $jogo->titulo }}</a></td>
                            <td><a href="/jogos/{{ $jogo->id }}">{{ $jogo->genero }}</a></td>
                            <td>{{ count($jogo->users) }}</td>
                            <td>
                                <a href="/jogos/editar/{{ $jogo->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>

                                <form action="/jogos/{{ $jogo->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger delete-btn" type="submit">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem jogos, <a href="/jogos/criar">criar jogo</a></p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Jogos que eu possuo</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($jogoAsParticipant )> 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="col"></th>
                        <th class="col">Nome</th>
                        <th class="col">Quantos possuem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jogoAsParticipant as $jogo)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/jogos/{{ $jogo->id }}">{{ $jogo->titulo }}</a></td>
                            <td>{{ count($jogo->users) }}</td>
                            <td>
                                <form action="/jogos/leave/{{$jogo->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline">Sair do jogo</ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @foreach ($jogoAsParticipant as $jogo)
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                        <h2 class="fs-4 fw-bold">Fresh new layout</h2>
                        <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p>
                    </div>
                </div>
            </div>
             @endforeach --}}
        @else
            <p>Você ainda não adicionou nenhum jogo a lita, <a href="/">veja todos os jogos</a></p>
        @endif
    </div>

@endsection
