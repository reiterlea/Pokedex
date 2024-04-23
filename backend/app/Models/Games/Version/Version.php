<?php


namespace App\Models\Games\Version;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class Version
{
    public int $id;
    public string $name;
    public array $names;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
