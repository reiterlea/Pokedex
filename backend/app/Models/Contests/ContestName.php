<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class ContestName
{
    public string $name;
    public string $color;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->color = $data['color'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
