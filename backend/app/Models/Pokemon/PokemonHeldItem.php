<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;
use App\Models\Item;

class PokemonHeldItem
{
    public NamedAPIResource $item;
    public array $version_details;

    public function __construct($data)
    {
        $this->item = new NamedAPIResource($data['item'], Item::class);
        $this->version_details = array_map(fn($detail) => new PokemonHeldItemVersion($detail), $data['version_details']);
    }
}
