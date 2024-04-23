<?php


namespace App\Models\Berries;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class BerryFirmness
{
    public int $id;
    public string $name;
    public array $berries;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->berries = array_map(fn($berry) => new NamedAPIResource($berry, Berry::class), $data['berries']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
