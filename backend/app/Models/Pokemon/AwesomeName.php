<?php


namespace App\Models\Utility;

use App\Models\Resource\NamedAPIResource;

class AwesomeName
{
    public string $awesome_name;
    public NamedAPIResource $language;

    public function __construct($data)
    {
        $this->awesome_name = $data['awesome_name'];
        $this->language = new NamedAPIResource($data['language'], Language::class);
    }
}
