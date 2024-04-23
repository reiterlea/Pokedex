<?php


namespace App\Models\Evolution;

use App\Models\Pokemon\PokemonSpecies;
use App\Models\Resource\NamedAPIResource;

class ChainLink
{
    public bool $is_baby;
    public NamedAPIResource $species;
    public array $evolution_details;
    public array $evolves_to;

    public function __construct($data)
    {
        $this->is_baby = $data['is_baby'];
        $this->species = new NamedAPIResource($data['species'], PokemonSpecies::class);
        $this->evolution_details = array_map(fn($detail) => new EvolutionDetail($detail), $data['evolution_details']);
        $this->evolves_to = array_map(fn($link) => new ChainLink($link), $data['evolves_to']);
    }
}
