<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;

class TypePokemon
{
    public int $slot;
    public NamedAPIResource $pokemon;

    public function __construct($data)
    {
        $this->slot = $data['slot'];
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
    }
}
