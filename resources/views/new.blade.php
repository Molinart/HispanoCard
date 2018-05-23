@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuevo Juego</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('save') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre del Juego</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" name="name" placeholder="Default: Nuevo Juego">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p1" class="col-sm-4 col-form-label text-md-right">Jugador A:</label>

                                <div class="col-md-6">
                                    <input id="p1" class="form-control" name="p1" placeholder="Default: A">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p2" class="col-sm-4 col-form-label text-md-right">Jugador B:</label>

                                <div class="col-md-6">
                                    <input id="p2" class="form-control" name="p2" placeholder="Default: B">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p3" class="col-sm-4 col-form-label text-md-right">Jugador C:</label>

                                <div class="col-md-6">
                                    <input id="p3" class="form-control" name="p3" placeholder="Default: C">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p4" class="col-sm-4 col-form-label text-md-right">Jugador D:</label>

                                <div class="col-md-6">
                                    <input id="p4" class="form-control" name="p4" placeholder="Default: D">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p5" class="col-sm-4 col-form-label text-md-right">Jugador E:</label>

                                <div class="col-md-6">
                                    <input id="p5" class="form-control" name="p5" placeholder="Default: E">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary">
                                        Jugar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection