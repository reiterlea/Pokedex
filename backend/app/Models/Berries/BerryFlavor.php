<?php


namespace App\Models\Berries;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;
use App\Models\Contests\ContestType;

class BerryFlavor
{
    public int $id;
    public string $name;
    public array $berries;
    public NamedAPIResource $contest_type;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->berries = array_map(fn($berry) => new FlavorBerryMap($berry), $data['berries']);
        $this->contest_type = new NamedAPIResource($data['contest_type'], ContestType::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
