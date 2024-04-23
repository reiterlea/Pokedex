<?php


namespace App\Models\Pokemon;

use App\Models\Moves\MoveDamageClass;
use App\Models\Resource\APIResource;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class Stat
{
    public int $id;
    public string $name;
    public int $game_index;
    public bool $is_battle_only;
    public MoveStatAffectSets $affecting_moves;
    public NatureStatAffectSets $affecting_natures;
    public array $characteristics; // list of APIResource (Characteristic)
    public NamedAPIResource $move_damage_class;
    public array $names; // list of Name

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->game_index = $data['game_index'];
        $this->is_battle_only = $data['is_battle_only'];
        $this->affecting_moves = new MoveStatAffectSets($data['affecting_moves']);
        $this->affecting_natures = new NatureStatAffectSets($data['affecting_natures']);
        $this->characteristics = array_map(function ($item) {
            return new APIResource($item, Characteristic::class);
        }, $data['characteristics']);
        $this->move_damage_class = new NamedAPIResource($data['move_damage_class'], MoveDamageClass::class);
        $this->names = array_map(function ($item) {
            return new Name($item);
        }, $data['names']);
    }
}
