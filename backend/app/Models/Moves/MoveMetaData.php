<?php


namespace App\Models\Moves;

use App\Models\Resource\NamedAPIResource;
use App\Models\Moves\MoveAilment;
use App\Models\Moves\MoveCategory;

class MoveMetaData
{
    public NamedAPIResource $ailment;
    public NamedAPIResource $category;
    public ?int $min_hits;
    public ?int $max_hits;
    public ?int $min_turns;
    public ?int $max_turns;
    public int $drain;
    public int $healing;
    public int $crit_rate;
    public int $ailment_chance;
    public int $flinch_chance;
    public int $stat_chance;

    public function __construct($data)
    {
        $this->ailment = new NamedAPIResource($data['ailment'], MoveAilment::class);
        $this->category = new NamedAPIResource($data['category'], MoveCategory::class);
        $this->min_hits = $data['min_hits'];
        $this->max_hits = $data['max_hits'];
        $this->min_turns = $data['min_turns'];
        $this->max_turns = $data['max_turns'];
        $this->drain = $data['drain'];
        $this->healing = $data['healing'];
    }
}
