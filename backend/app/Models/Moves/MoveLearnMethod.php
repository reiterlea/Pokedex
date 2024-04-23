<?php


namespace App\Models\Moves;

use App\Models\Games\Version\VersionGroup;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Description;
use App\Models\Utility\Name;

class MoveLearnMethod
{
    public int $id;
    public string $name;
    public array $descriptions;
    public array $names;
    public array $version_groups;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->version_groups = array_map(fn($vg) => new NamedAPIResource($vg, VersionGroup::class), $data['version_groups']);
    }
}
