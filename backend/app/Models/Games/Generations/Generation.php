<?php


namespace App\Models\Games\Generations;

use App\Models\Region;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class Generation
{
    public int $id;
    public string $name;
    public array $abilities;
    public array $names;
    public NamedAPIResource $main_region;
    public array $moves;
    public array $pokemon_species;
    public array $types;
    public array $version_groups;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->abilities = array_map(fn($ability) => new NamedAPIResource($ability, Ability::class), $data['abilities']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->main_region = new NamedAPIResource($data['main_region'], Region::class);
        $this->moves = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['moves']);
        $this->pokemon_species = array_map(fn($species) => new NamedAPIResource($species, PokemonSpecies::class), $data['pokemon_species']);
        $this->types = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['types']);
        $this->version_groups = array_map(fn($group) => new NamedAPIResource($group, VersionGroup::class), $data['version_groups']);
    }
}
