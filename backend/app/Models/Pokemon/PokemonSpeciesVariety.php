<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;

class PokemonSpeciesVariety
{
    public bool $is_default;
    public NamedAPIResource $pokemon;

    public function __construct($data)
    {
        $this->is_default = $data['is_default'];
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
    }
}
