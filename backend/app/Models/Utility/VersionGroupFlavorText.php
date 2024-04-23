<?php


namespace App\Models\Utility;

use App\Models\Games\Version\VersionGroup;
use App\Models\Resource\NamedAPIResource;

class VersionGroupFlavorText
{
    public string $text;
    public NamedAPIResource $language;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->text = $data['text'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
