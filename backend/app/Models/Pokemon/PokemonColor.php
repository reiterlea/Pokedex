<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class PokemonColor
{
    public int $id;
    public string $name;
    public array $names;
    public array $pokemon_species;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon_species = array_map(fn($species) => new NamedAPIResource($species, PokemonSpecies::class), $data['pokemon_species']);    }
}
