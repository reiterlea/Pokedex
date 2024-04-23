<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;

class Gender
{
    public int $id;
    public string $name;
    public array $pokemon_species_details;
    public array $required_for_evolution;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->pokemon_species_details = array_map(fn($detail) => new PokemonSpeciesGender($detail), $data['pokemon_species_details']);
        $this->required_for_evolution = array_map(fn($species) => new NamedAPIResource($species, PokemonSpecies::class), $data['required_for_evolution']);
    }
}
