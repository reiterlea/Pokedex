<?php


namespace App\Models\Item;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class ItemPocket
{
    public int $id;
    public string $name;
    public array $categories;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->categories = array_map(fn($category) => new NamedAPIResource($category, ItemCategory::class), $data['categories']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
