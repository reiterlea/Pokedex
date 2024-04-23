<?php


namespace App\Models\Pokemon\Abilities;

use App\Models\Effect;
use App\Models\Resource\NamedAPIResource;
use App\Models\VersionGroup;

class AbilityEffectChange
{
    public array $effect_entries;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->effect_entries = array_map(fn($effect) => new Effect($effect), $data['effect_entries']);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
