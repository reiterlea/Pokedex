<?php


namespace App\Models\Games\Pokedexes;

use App\Models\Pokemon\PokemonSpecies;
use App\Models\Resource\NamedAPIResource;

class PokemonEntry
{
    public int $entry_number;
    public NamedAPIResource $pokemon_species;

    public function __construct($data)
    {
        $this->entry_number = $data['entry_number'];
        $this->pokemon_species = new NamedAPIResource($data['pokemon_species'], PokemonSpecies::class);
    }
}
