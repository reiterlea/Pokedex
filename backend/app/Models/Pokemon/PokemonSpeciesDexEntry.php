<?php


namespace App\Models\Pokemon;

use App\Models\Games\Pokedexes\Pokedex;
use App\Models\Resource\NamedAPIResource;

class PokemonSpeciesDexEntry
{
    public int $entry_number;
    public NamedAPIResource $pokedex;

    public function __construct($data)
    {
        $this->entry_number = $data['entry_number'];
        $this->pokedex = new NamedAPIResource($data['pokedex'], Pokedex::class);
    }
}
