<?php

namespace App\Models\Pokemon;

class PokemonAbility
{
    public string $name;
    public bool $is_hidden;
    public int $slot;

    public function __construct($data)
    {
        $this->name = $data['ability']['name'];
        $this->is_hidden = $data['is_hidden'];
        $this->slot = $data['slot'];
    }
}
