<?php


namespace App\Models\Pokemon;

use App\Models\Moves\Move;
use App\Models\Resource\NamedAPIResource;

class PokemonMove
{
    public NamedAPIResource $move;
    public array $version_group_details;

    public function __construct($data)
    {
        $this->move = new NamedAPIResource($data['move'], Move::class);
        $this->version_group_details = array_map(fn($detail) => new PokemonMoveVersion($detail), $data['version_group_details']);
    }
}
