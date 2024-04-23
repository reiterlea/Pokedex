<?php


namespace App\Models\Locations;

use App\Models\GenerationGameIndex;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class Location
{
    public int $id;
    public string $name;
    public NamedAPIResource $region;
    public array $names;
    public array $game_indices;
    public array $areas;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->region = new NamedAPIResource($data['region'], Region::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->game_indices = array_map(fn($index) => new GenerationGameIndex($index), $data['game_indices']);
        $this->areas = array_map(fn($area) => new NamedAPIResource($area, LocationArea::class), $data['areas']);
    }
}
