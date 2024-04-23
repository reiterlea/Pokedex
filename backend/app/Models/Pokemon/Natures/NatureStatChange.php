<?php


namespace App\Models\Pokemon\Natures;

use App\Models\Pokemon\PokeathlonStat;
use App\Models\Resource\NamedAPIResource;

class NatureStatChange
{
    public int $max_change;
    public NamedAPIResource $pokeathlon_stat;

    public function __construct($data)
    {
        $this->max_change = $data['max_change'];
        $this->pokeathlon_stat = new NamedAPIResource($data['pokeathlon_stat'], PokeathlonStat::class);
    }
}
