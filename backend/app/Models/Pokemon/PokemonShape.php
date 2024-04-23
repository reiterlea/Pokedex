<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;
use App\Models\Utility\AwesomeName;

class PokemonShape
{
    public int $id;
    public string $name;
    public array $awesome_names;
    public array $names;
    public array $pokemon_species;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->awesome_names = array_map(fn($awesome_name) => new AwesomeName($awesome_name), $data['awesome_names']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon_species = array_map(fn($species) => new NamedAPIResource($species, PokemonSpecies::class), $data['pokemon_species']);
    }
}
