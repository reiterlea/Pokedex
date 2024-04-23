<?php


namespace App\Models\Locations;

use App\Models\Encounters\EncounterMethod;
use App\Models\Resource\NamedAPIResource;

class EncounterMethodRate
{
    public NamedAPIResource $encounter_method;
    public array $version_details;

    public function __construct($data)
    {
        $this->encounter_method = new NamedAPIResource($data['encounter_method'], EncounterMethod::class);
        $this->version_details = array_map(fn($detail) => new EncounterVersionDetails($detail), $data['version_details']);
    }
}
