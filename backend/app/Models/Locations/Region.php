<?php


namespace App\Models\Locations;

use App\Models\Games\Generations\Generation;
use App\Models\Games\Pokedexes\Pokedex;
use App\Models\Games\Version\VersionGroup;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class Region
{
    public int $id;
    public array $locations;
    public string $name;
    public array $names;
    public NamedAPIResource $main_generation;
    public array $pokedexes;
    public array $version_groups;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->locations = array_map(fn($location) => new NamedAPIResource($location, Location::class), $data['locations']);
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->main_generation = new NamedAPIResource($data['main_generation'], Generation::class);
        $this->pokedexes = array_map(fn($pokedex) => new NamedAPIResource($pokedex, Pokedex::class), $data['pokedexes']);
        $this->version_groups = array_map(fn($versionGroup) => new NamedAPIResource($versionGroup, VersionGroup::class), $data['version_groups']);
    }
}
