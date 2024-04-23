<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;
use App\Models\Pokemon\PokemonSpecies;

class PokemonSpeciesGender
{
    public int $rate;
    public NamedAPIResource $pokemon_species;

    public function __construct($data)
    {
        $this->rate = $data['rate'];
        $this->pokemon_species = new NamedAPIResource($data['pokemon_species'], PokemonSpecies::class);
    }
}
