<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class Description
{
    public string $description;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->description = $data['description'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
