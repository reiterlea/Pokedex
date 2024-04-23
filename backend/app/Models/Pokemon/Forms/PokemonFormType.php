<?php

namespace App\Models\Pokemon\Forms;

use App\Models\Pokemon\Type\Type;
use App\Models\Resource\NamedAPIResource;

class PokemonFormType
{
    public int $slot;
    public NamedAPIResource $type;

    public function __construct($data)
    {
        $this->slot = $data['slot'];
        $this->type = new NamedAPIResource($data['type'], Type::class);
    }
}
