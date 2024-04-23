<?php


namespace App\Models\Pokemon\GrowthRates;

use App\Models\GrowthRateExperienceLevel;
use App\Models\Pokemon\PokemonSpecies;
use App\Models\Resource\NamedAPIResource;

class GrowthRate
{
    public int $id;
    public string $name;
    public string $formula;
    public array $descriptions;
    public array $levels;
    public array $pokemon_species;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->formula = $data['formula'];
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
        $this->levels = array_map(fn($level) => new GrowthRateExperienceLevel($level), $data['levels']);
        $this->pokemon_species = array_map(fn($species) => new NamedAPIResource($species, PokemonSpecies::class), $data['pokemon_species']);
    }
}
