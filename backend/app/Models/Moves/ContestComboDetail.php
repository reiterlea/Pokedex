<?php


namespace App\Models\Moves;

use App\Models\Resource\NamedAPIResource;
use App\Models\Moves\Move;

class ContestComboDetail
{
    public array $use_before;
    public array $use_after;

    public function __construct($data)
    {
        $this->use_before = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['use_before']);
        $this->use_after = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['use_after']);
    }
}
