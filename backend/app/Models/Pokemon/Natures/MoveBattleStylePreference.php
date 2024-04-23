<?php


namespace App\Models\Pokemon;

use App\Models\Moves\MoveBattleStyle;
use App\Models\Resource\NamedAPIResource;

class MoveBattleStylePreference
{
    public int $low_hp_preference;
    public int $high_hp_preference;
    public NamedAPIResource $move_battle_style;

    public function __construct($data)
    {
        $this->low_hp_preference = $data['low_hp_preference'];
        $this->high_hp_preference = $data['high_hp_preference'];
        $this->move_battle_style = new NamedAPIResource($data['move_battle_style'], MoveBattleStyle::class);
    }
}
