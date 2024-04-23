<?php

namespace App\Models\Games\Pokedexes;

use App\Models\Region;
use App\Models\Resource\NamedAPIResource;

class Pokedex
{
    public int $id;
    public string $name;
    public array $descriptions;
    public array $names;
    public array $pokemon_entries;
    public NamedAPIResource $region;
    public array $version_groups;
    public bool $is_main_series;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->is_main_series = $data['is_main_series'];
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon_entries = array_map(fn($pokemon_entry) => new PokemonEntry($pokemon_entry), $data['pokemon_entries']);
        $this->region = new NamedAPIResource($data['region'], Region::class);
        $this->version_groups = array_map(fn($version_group) => new NamedAPIResource($version_group, VersionGroup::class), $data['version_groups']);
    }
}
