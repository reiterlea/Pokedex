<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class VerboseEffect
{
    public string $effect;
    public string $short_effect;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->effect = $data['effect'];
        $this->short_effect = $data['short_effect'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
