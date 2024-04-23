<?php


namespace App\Models\Pokemon;

use App\Models\Pokemon\Natures\NaturePokeathlonStatAffectSets;
use App\Models\Utility\Name;

class PokeathlonStat
{
    public int $id;
    public string $name;
    public array $names;
    public NaturePokeathlonStatAffectSets $affecting_natures;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->affecting_natures = new NaturePokeathlonStatAffectSets($data['affecting_natures']);
    }
}
