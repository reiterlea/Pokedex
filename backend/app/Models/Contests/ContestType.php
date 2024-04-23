<?php


namespace App\Models\Contests;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\ContestName;
use App\Models\Berries\BerryFlavor;

class ContestType
{
    public int $id;
    public string $name;
    public NamedAPIResource $berry_flavor;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->berry_flavor = new NamedAPIResource($data['berry_flavor'], BerryFlavor::class);
        $this->names = array_map(fn($name) => new ContestName($name), $data['names']);
    }
}
