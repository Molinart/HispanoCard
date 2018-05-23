<?php

namespace App\Http\Controllers;

use App\Entities\Game;
use App\Entities\Gamer;
use App\Entities\Puntos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juegos = Game::all();
        return view('welcome', compact('juegos', 'puntos'));
    }

    public function add($id, $game)
    {
        $punto = new Puntos();
        $punto->valor = 1;
        $punto->gamer_id = $id;
        $punto->save();

        return redirect(route('play', $game));
    }

    public function loss($id, $game)
    {
        $punto = new Puntos();
        $punto->valor = -1;
        $punto->gamer_id = $id;
        $punto->save();

        return redirect(route('play', $game));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function play($id)
    {
        $juego = Game::findOrFail($id);
        $jugadores = Gamer::where('game_id', $id)->get();
        $puntos = Puntos::whereIn('gamer_id', $jugadores->pluck('id')->toArray())->get();
        $i = 1;

        return view('play', compact('juego', 'jugadores', 'puntos', 'i'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function newGame(Request $request)
    {
        $game = new Game();
        if ($request->name != null){
            $game->name = $request->nombre;
        } else {
            $game->name = 'Nuevo Juego ' . rand(99, 9999);
        }
        $game->save();

        $p1 = new Gamer();
        if ($request->p1 != null){
            $p1->name = $request->p1;
        } else {
            $p1->name = 'A';
        }
        $p1->player = 'A';
        $p1->game_id = $game->id;
        $p1->save();

        $p2 = new Gamer();
        if ($request->p2 != null){
            $p2->name = $request->p2;
        } else {
            $p2->name = 'B';
        }
        $p2->player = 'B';
        $p2->game_id = $game->id;
        $p2->save();

        $p3 = new Gamer();
        if ($request->p3 != null){
            $p3->name = $request->p3;
        } else {
            $p3->name = 'C';
        }
        $p3->player = 'C';
        $p3->game_id = $game->id;
        $p3->save();

        $p4 = new Gamer();
        if ($request->p4 != null){
            $p4->name = $request->p4;
        } else {
            $p4->name = 'D';
        }
        $p4->player = 'D';
        $p4->game_id = $game->id;
        $p4->save();

        $p5 = new Gamer();
        if ($request->p5 != null){
            $p5->name = $request->p5;
        } else {
            $p5->name = 'E';
        }
        $p5->player = 'E';
        $p5->game_id = $game->id;
        $p5->save();

        return redirect(route('play', $game->id));
    }
}
