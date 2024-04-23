<?php


namespace App\Models\Locations;

use App\Models\Games\Version\Version;
use App\Models\Resource\NamedAPIResource;

class EncounterVersionDetails
{
    public int $rate;
    public NamedAPIResource $version;

    public function __construct($data)
    {
        $this->rate = $data['rate'];
        $this->version = new NamedAPIResource($data['version'], Version::class);
    }
}
