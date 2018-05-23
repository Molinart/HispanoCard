<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    protected $table = "games";

    protected $fillable = [
        'id',
        'name',
    ];

    public function gamers(){
        return $this->belongsToMany(Gamer::class);
    }

    function getValueAttribute() {
        $points = DB::table('points')->where('user_id', $this->id)->sum('valor');
        return $points;
    }

    protected $appends = ['value'];
}
