<?php


namespace App\Models\Locations;

use App\Models\Utility\Name;
use App\Models\Locations\PalParkEncounterSpecies;

class PalParkArea
{
    public int $id;
    public string $name;
    public array $names;
    public array $pokemon_encounters;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon_encounters = array_map(fn($encounter) => new PalParkEncounterSpecies($encounter), $data['pokemon_encounters']);
    }
}
