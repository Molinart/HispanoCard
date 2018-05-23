@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Jugar</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Acctiones</th>
                                <th scope="col">Jugador</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jugadores as $j)
                                <tr>
                                    <td>
                                        <span class="input-group-btn">
                                            <a href="{{ route('add-point', [$j->id, $juego->id]) }}" id="increaseButton" class="btn btn-success">+</a>
                                        </span>
                                        <span class="input-group-btn" style="margin: 0 15px">
                                            <a href="{{ route('loss-point', [$j->id, $juego->id]) }}" id="decreaseButton" class="btn btn-danger">-</a>
                                        </span>
                                    </td>
                                    <td>{{ $j->player  }}</td>
                                    <td>{{ $j->name }}</td>
                                    <td>{{ $j->puntos->sum('valor') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="container" style="background: #f5f8fa">
                        @foreach($puntos as $p)
                            @if($p->valor == 1) {{ strtoupper($p->gamer->player) }} @else {{ strtolower($p->gamer->player) }} @endif
                        @endforeach
                    </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puntos as $p)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $p->gamer->name }}</td>
                                <td>{{ $p->valor }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection