<?php


namespace App\Models\Games\Version;

use App\Models\Games\Generations\Generation;
use App\Models\Games\Pokedexes\Pokedex;
use App\Models\Resource\NamedAPIResource;

class VersionGroup
{
    public int $id;
    public string $name;
    public int $order;
    public NamedAPIResource $generation;
    public array $move_learn_methods;
    public array $pokedexes;
    public array $regions;
    public array $versions;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->move_learn_methods = array_map(fn($move_learn_method) => new NamedAPIResource($move_learn_method, MoveLearnMethod::class), $data['move_learn_methods']);
        $this->pokedexes = array_map(fn($pokedex) => new NamedAPIResource($pokedex, Pokedex::class), $data['pokedexes']);
        $this->regions = array_map(fn($region) => new NamedAPIResource($region, Region::class), $data['regions']);
        $this->versions = array_map(fn($version) => new NamedAPIResource($version, Version::class), $data['versions']);
    }
}
