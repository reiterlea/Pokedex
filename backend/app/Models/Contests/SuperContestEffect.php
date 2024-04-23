<?php


namespace App\Models\Contests;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\FlavorText;

class SuperContestEffect
{
    public int $id;
    public int $appeal;
    public array $flavor_text_entries;
    public array $moves;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->appeal = $data['appeal'];
        $this->flavor_text_entries = array_map(fn($flavorText) => new FlavorText($flavorText), $data['flavor_text_entries']);
        $this->moves = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['moves']);
    }
}
