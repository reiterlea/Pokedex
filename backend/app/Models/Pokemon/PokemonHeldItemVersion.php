<?php


namespace App\Models\Pokemon;

use App\Models\Games\Version\Version;
use App\Models\Resource\NamedAPIResource;

class PokemonHeldItemVersion
{
    public NamedAPIResource $version;
    public int $rarity;

    public function __construct($data)
    {
        $this->version = new NamedAPIResource($data['version'], Version::class);
        $this->rarity = $data['rarity'];
    }
}
