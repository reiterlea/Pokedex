<?php


namespace App\Models\Moves;

use App\Models\Games\Version\VersionGroup;
use App\Models\Pokemon\Type\Type;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\VerboseEffect;

class PastMoveStatValues
{
    public int $accuracy;
    public int $effect_chance;
    public int $power;
    public int $pp;
    public array $effect_entries;
    public NamedAPIResource $type;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->accuracy = $data['accuracy'];
        $this->effect_chance = $data['effect_chance'];
        $this->power = $data['power'];
        $this->pp = $data['pp'];
        $this->effect_entries = array_map(fn($effect) => new VerboseEffect($effect), $data['effect_entries']);
        $this->type = new NamedAPIResource($data['type'], Type::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
