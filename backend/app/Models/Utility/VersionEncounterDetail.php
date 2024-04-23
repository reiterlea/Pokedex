<?php


namespace App\Models\Utility;

use App\Models\Games\Version\Version;
use App\Models\Resource\NamedAPIResource;

class VersionEncounterDetail
{
    public NamedAPIResource $version;
    public int $max_chance;
    public array $encounter_details;

    public function __construct($data)
    {
        $this->version = new NamedAPIResource($data['version'], Version::class);
        $this->max_chance = $data['max_chance'];
        $this->encounter_details = array_map(fn($encounter_detail) => new Encounter($encounter_detail), $data['encounter_details']);
    }
}
