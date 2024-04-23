<?php


namespace App\Models\Utility;

class Language
{
    public int $id;
    public string $name;
    public bool $official;
    public string $iso639;
    public string $iso3166;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->official = $data['official'];
        $this->iso639 = $data['iso639'];
        $this->iso3166 = $data['iso3166'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
