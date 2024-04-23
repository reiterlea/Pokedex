<?php


namespace App\Models\Locations;

use App\Models\Pokemon\PokemonSpecies;
use App\Models\Resource\NamedAPIResource;

class PalParkEncounterSpecies
{
    public int $base_score;
    public int $rate;
    public NamedAPIResource $pokemon_species;

    public function __construct($data)
    {
        $this->base_score = $data['base_score'];
        $this->rate = $data['rate'];
        $this->pokemon_species = new NamedAPIResource($data['pokemon_species'], PokemonSpecies::class);
    }
}
