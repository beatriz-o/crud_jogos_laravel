<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\User;

class JogoController extends Controller
{
    private function subirImagem(Request $request, Jogo $jogo): void{
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/jogos'),$nomeImagem);
            $jogo->imagem = $nomeImagem;
        }
    }
        
    public function index(){
        $search = request('search');

        if($search){
            $jogos = Jogo::where([
                    ['titulo','like','%'.$search.'%']
            ])->get();
        }else{
            $jogos = Jogo::all();
        }
        
        return view('welcome',['jogos'=>$jogos, 'search'=>$search]);
    }

    public function criar(){
        return view('jogos.criar');
    }

    public function contato(){
        return view('contato');
    }

    public function produtos(){
        #query parameters http://127.0.0.1:8000/produtos?search=camisa
        $busca = request('search');
        return view('produtos',['busca'=>$busca]);
    }

    public function store(Request $request){
        $jogo= new Jogo;

        $jogo->titulo = $request->titulo;
        $jogo->genero = $request->genero;
        $jogo->plataforma = $request->plataforma;
        $jogo->preco = $request->preco;

        //upload imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/jogos'),$nomeImagem);
            $jogo->imagem = $nomeImagem;
        }
        $user = auth()->user();
        $jogo->user_id = $user->id;

        $jogo->save();

        return redirect('/')->with('msg', 'Jogo criado com sucesso');
    }
    public function mostrar($id){
        $jogo = Jogo::findOrFail($id);
        $user = auth()->user();
        $hasUserJoined = false;
        if($user){
            $userJogos = $user->jogoAsParticipant->toArray();
            foreach($userJogos as $userEvent){
                if($userEvent['id']==$id){
                    $hasUserJoined = true;
                }
            }
        }
        $jogoOwner = User::where('id', $jogo->user_id)->first()->toArray();

        return view('jogos.mostrar',['jogo'=>$jogo, 'jogoOwner'=>$jogoOwner, 'hasUserJoined'=>$hasUserJoined]);
    }

   
    public function dashboard() {

        $user = auth()->user();

        $jogos = $user->jogos;

        $jogoAsParticipant = $user->jogoAsParticipant;

        return view('jogos.dashboard', ['jogos' => $jogos, 'jogoAsParticipant'=>$jogoAsParticipant]);

    }
    public function destroy($id){
        Jogo::findOrFail($id)->delete();
        Jogo::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Jogo excluído com sucesso');
    }

    public function editar($id){
        $user = auth()->user();
        $jogo= Jogo::findOrFail($id);
        //para evitar que qualquer usuario edite um Jogo
        if($user->id!=$jogo->user_id){
            return redirect('/dashboard');
        }
        return view('jogos.editar', ['jogo'=>$jogo]);
    }

    public function update(Request $request){

        $data = $request->all();
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/jogos'),$nomeImagem);
            $data['imagem'] = $nomeImagem;
        }
    
        Jogo::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Jogo editado com sucesso');
    }

    public function joinJogo($id){
        $user = auth()->user();

        $user->jogoAsParticipant()->attach($id);
        
        $jogo= Jogo::findOrFail($id);
        return redirect('/dashboard')->with('msg', $jogo->titulo.' incluído na lista com sucesso');
    }

    public function leaveJogo($id){
        $user = auth()->user();
        $user->jogoAsParticipant()->detach($id);
        $jogo= Jogo::findOrFail($id);
        return redirect('/dashboard')->with('msg', $jogo->titulo.' retirado da lista com sucesso');
    }
}

