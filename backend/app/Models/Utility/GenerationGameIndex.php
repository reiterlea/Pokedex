<?php


namespace App\Models;

use App\Models\Games\Generations\Generation;
use App\Models\Resource\NamedAPIResource;

class GenerationGameIndex
{
    public int $game_index;
    public NamedAPIResource $generation;

    public function __construct($data)
    {
        $this->game_index = $data['game_index'];
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
    }
}
