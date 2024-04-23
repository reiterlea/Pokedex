<?php


namespace App\Models\Pokemon;

use App\Models\Games\Generations\Generation;
use App\Models\Resource\NamedAPIResource;

class PokemonTypePast
{
    public NamedAPIResource $generation;
    public array $types;

    public function __construct($data)
    {
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->types = array_map(fn($type) => new PokemonType($type), $data['types']);
    }
}
