<?php


namespace App\Models\Pokemon;

use App\Models\Locations\LocationArea;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\VersionEncounterDetail;

class LocationAreaEncounter
{
    public NamedAPIResource $location_area;
    public array $version_details;

    public function __construct($data)
    {
        $this->location_area = new NamedAPIResource($data['location_area'], LocationArea::class);
        $this->version_details = array_map(fn($detail) => new VersionEncounterDetail($detail), $data['version_details']);
    }
}
