<?php


namespace App\Models\Moves;

use App\Models\Resource\NamedAPIResource;
use App\Models\Stats\Stat;

class MoveStatChange
{
    public int $change;
    public NamedAPIResource $stat;

    public function __construct($data)
    {
        $this->change = $data['change'];
        $this->stat = new NamedAPIResource($data['stat'], Stat::class);
    }
}
