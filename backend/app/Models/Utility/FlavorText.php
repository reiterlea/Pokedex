<?php


namespace App\Models\Utility;

use App\Models\Games\Version\Version;
use App\Models\Resource\NamedAPIResource;

class FlavorText
{
    public string $flavor_text;
    public NamedAPIResource $language;
    public NamedAPIResource $version;

    public function __construct($data)
    {
        $this->flavor_text = $data['flavor_text'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
        $this->version = new NamedAPIResource($data['version'], Version::class);
    }
}
