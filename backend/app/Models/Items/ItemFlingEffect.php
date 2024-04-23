<?php


namespace App\Models\Item;

use App\Models\Item;
use App\Models\Resource\NamedAPIResource;
use App\Models\Resource\Effect;

class ItemFlingEffect
{
    public int $id;
    public string $name;
    public array $effect_entries;
    public array $items;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->effect_entries = array_map(fn($effect) => new Effect($effect), $data['effect_entries']);
        $this->items = array_map(fn($item) => new NamedAPIResource($item, Item::class), $data['items']);
    }
}
