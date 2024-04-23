<?php


namespace App\Models\Resource;

use App\Models\Pokemon\Pokemon;

class ItemHolderPokemon
{
    public NamedAPIResource $pokemon;
    public array $version_details;

    public function __construct($data)
    {
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
        $this->version_details = array_map(fn($detail) => new ItemHolderPokemonVersionDetail($detail), $data['version_details']);
    }
}
