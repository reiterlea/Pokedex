<?php

namespace App\Models\Pokemon\Natures;

use App\Models\Resource\NamedAPIResource;

class NaturePokeathlonStatAffect
{
    public int $max_change;
    public NamedAPIResource $nature;

    public function __construct($data)
    {
        $this->max_change = $data['max_change'];
        $this->nature = new NamedAPIResource($data['nature'], Nature::class);
    }
}
