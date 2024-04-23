<?php


namespace App\Models\Pokemon\Abilities;

use App\Models\Pokemon\Pokemon;
use App\Models\Resource\NamedAPIResource;

class AbilityPokemon
{
    public bool $is_hidden;
    public int $slot;
    public NamedAPIResource $pokemon;

    public function __construct($data)
    {
        $this->is_hidden = $data['is_hidden'];
        $this->slot = $data['slot'];
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
    }
}
