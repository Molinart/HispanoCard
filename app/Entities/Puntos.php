<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    protected $table = "points";

    protected $fillable = [
        'gamer_id',
        'valor',
    ];

    public function gamer() {
        return $this->belongsTo(Gamer::class);
    }
}
