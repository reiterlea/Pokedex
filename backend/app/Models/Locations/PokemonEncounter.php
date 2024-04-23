<?php


namespace App\Models\Locations;

use App\Models\Pokemon\Pokemon;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\VersionEncounterDetail;

class PokemonEncounter
{
    public NamedAPIResource $pokemon;
    public array $version_details;

    public function __construct($data)
    {
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
        $this->version_details = array_map(fn($detail) => new VersionEncounterDetail($detail), $data['version_details']);
    }
}
