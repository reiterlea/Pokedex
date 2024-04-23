<?php


namespace App\Models\Pokemon;

use App\Models\Pokemon\Natures\Nature;
use App\Models\Resource\NamedAPIResource;

class NatureStatAffectSets
{
    public array $increase;
    public array $decrease;

    public function __construct($data)
    {
        $this->increase = array_map(function ($item) {
            return new NamedAPIResource($item, Nature::class);
        }, $data['increase']);
        $this->decrease = array_map(function ($item) {
            return new NamedAPIResource($item, Nature::class);
        }, $data['decrease']);
    }
}
