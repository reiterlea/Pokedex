<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class Genus
{
    public string $genus;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->genus = $data['genus'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
