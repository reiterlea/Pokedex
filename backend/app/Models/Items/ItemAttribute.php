<?php


namespace App\Models\Item;

use App\Models\Item;
use App\Models\Resource\Description;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class ItemAttribute
{
    public int $id;
    public string $name;
    public array $items;
    public array $names;
    public array $descriptions;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->items = array_map(fn($item) => new NamedAPIResource($item, Item::class), $data['items']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
    }
}
