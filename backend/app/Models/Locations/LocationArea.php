<?php


namespace App\Models\Locations;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;
use App\Models\Locations\EncounterMethodRate;
use App\Models\Locations\PokemonEncounter;

class LocationArea
{
    public int $id;
    public string $name;
    public int $game_index;
    public array $encounter_method_rates;
    public NamedAPIResource $location;
    public array $names;
    public array $pokemon_encounters;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->game_index = $data['game_index'];
        $this->encounter_method_rates = array_map(fn($rate) => new EncounterMethodRate($rate), $data['encounter_method_rates']);
        $this->location = new NamedAPIResource($data['location'], Location::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon_encounters = array_map(fn($encounter) => new PokemonEncounter($encounter), $data['pokemon_encounters']);
    }
}
