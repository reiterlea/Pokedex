<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class Name
{
    public string $name;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
