<?php

namespace App\Models\Pokemon\Natures;

class NaturePokeathlonStatAffectSets
{
    public array $increase;
    public array $decrease;

    public function __construct($data)
    {
        $this->increase = array_map(fn($affect) => new NaturePokeathlonStatAffect($affect), $data['increase']);
        $this->decrease = array_map(fn($affect) => new NaturePokeathlonStatAffect($affect), $data['decrease']);
    }
}
