<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;

class PokemonStat
{
    public NamedAPIResource $stat;
    public int $effort;
    public int $base_stat;

    public function __construct($data)
    {
        $this->stat = new NamedAPIResource($data['stat'], Stat::class);
        $this->effort = $data['effort'];
        $this->base_stat = $data['base_stat'];
    }
}
