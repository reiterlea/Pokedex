<?php


namespace App\Models;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Language;

class Effect
{
    public string $effect;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->effect = $data['effect'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
