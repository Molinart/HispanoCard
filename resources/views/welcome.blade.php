<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Molinart | HispanoCard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/emi.css') }}">

    </head>
    <body>
        <main role="main">

            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">Bienvenido al juego</h1>
                    <p>
                        5 amigos (los llamaremos a, b, c, d y e) están jugando y necesitan mantener el
                        seguimiento de sus anotaciones. Cada vez que alguno anota un punto, la letra de su
                        nombre debe ser ingresada en minúscula. Si alguien pierde un punto, la letra de su
                        nombre debe ser ingresada en mayúscula. El resultado debe de mostrarse ordenado de
                        mayor a menor puntuación.
                    </p>
                    <p><a class="btn btn-primary btn-lg" href="{{ url('/new_game') }}" role="button">Comenzar</a></p>
                </div>
            </div>

            <div class="container">
                <h2>Resultados Anteriores:</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Juego</th>
                        <th scope="col">Cadena</th>
                        <th scope="col">Iniciado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($juegos as $j)
                        <tr>
                            <td>{{ $j->id  }}</td>
                            <td><a href="{{ route('play', $j->id) }}">{{ $j->name  }}</a></td>
                            <td>
                                <a href="{{ route('play', $j->id) }}">
                                    @foreach($j->gamers as $g)
                                        @foreach($g->puntos as $p)
                                            @if($p->valor == 1) {{ strtoupper($p->gamer->player) }} @else {{ strtolower($p->gamer->player) }} @endif
                                        @endforeach
                                    @endforeach
                                </a>
                            </td>
                            <td>{{ $j->created_at  }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
