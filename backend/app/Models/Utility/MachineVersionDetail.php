<?php


namespace App\Models;

use App\Models\Games\Version\VersionGroup;
use App\Models\Resource\APIResource;
use App\Models\Resource\NamedAPIResource;

class MachineVersionDetail
{
    public APIResource $machine;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->machine = new APIResource($data['machine'], Machine::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
