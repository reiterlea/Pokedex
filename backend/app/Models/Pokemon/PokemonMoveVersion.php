<?php


namespace App\Models\Pokemon;

use App\Models\Games\Version\VersionGroup;
use App\Models\Moves\MoveLearnMethod;
use App\Models\Resource\NamedAPIResource;

class PokemonMoveVersion
{
    public NamedAPIResource $move_learn_method;
    public NamedAPIResource $version_group;
    public int $level_learned_at;

    public function __construct($data)
    {
        $this->move_learn_method = new NamedAPIResource($data['move_learn_method'], MoveLearnMethod::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
        $this->level_learned_at = $data['level_learned_at'];
    }
}
