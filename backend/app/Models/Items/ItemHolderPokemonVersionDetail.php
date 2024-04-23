<?php


namespace App\Models\Item;

use App\Models\Item;
use App\Models\Resource\NamedAPIResource;

class ItemHolderPokemonVersionDetail
{
    public int $rarity;
    public NamedAPIResource $version;

    public function __construct($data)
    {
        $this->rarity = $data['rarity'];
        $this->version = new NamedAPIResource($data['version'], Version::class);
    }
}
