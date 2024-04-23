<?php


namespace App\Models\Pokemon;

class MoveStatAffectSets
{
    public array $increase; // list of MoveStatAffect
    public array $decrease; // list of MoveStatAffect

    public function __construct($data)
    {
        $this->increase = array_map(function ($item) {
            return new MoveStatAffect($item);
        }, $data['increase']);
        $this->decrease = array_map(function ($item) {
            return new MoveStatAffect($item);
        }, $data['decrease']);
    }
}
