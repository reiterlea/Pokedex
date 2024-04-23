<?php


namespace App\Models\Pokemon;

class PokemonCries
{
    public string $latest;
    public string $legacy;

    public function __construct($data)
    {
        $this->latest = $data['latest'];
        $this->legacy = $data['legacy'];
    }
}
