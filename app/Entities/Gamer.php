<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    protected $table = "gamers";

    protected $fillable = [
        'player',
        'name',
    ];

    public function gamers() {
        return $this->hasMany(Game::class);
    }

    public function puntos() {
        return $this->hasMany(Puntos::class);
    }
}
