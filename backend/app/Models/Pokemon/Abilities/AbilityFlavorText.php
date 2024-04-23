<?php


namespace App\Models\Pokemon\Abilities;

use App\Models\Ability\VersionGroup;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Language;

class AbilityFlavorText
{
    public string $flavor_text;
    public NamedAPIResource $language;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->flavor_text = $data['flavor_text'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
