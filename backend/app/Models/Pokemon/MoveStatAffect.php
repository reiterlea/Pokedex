<?php


namespace App\Models\Pokemon;

use App\Models\Moves\Move;
use App\Models\Resource\NamedAPIResource;

class MoveStatAffect
{
    public int $change;
    public NamedAPIResource $move;

    public function __construct($data)
    {
        $this->change = $data['change'];
        $this->move = new NamedAPIResource($data['move'], Move::class);
    }
}
