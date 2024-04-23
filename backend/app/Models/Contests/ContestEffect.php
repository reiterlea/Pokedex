<?php


namespace App\Models\Contests;

use App\Models\Effect;
use App\Models\Utility\FlavorText;

class ContestEffect
{
    public int $id;
    public int $appeal;
    public int $jam;
    public array $effect_entries;
    public array $flavor_text_entries;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->appeal = $data['appeal'];
        $this->jam = $data['jam'];
        $this->effect_entries = array_map(fn($effect) => new Effect($effect), $data['effect_entries']);
        $this->flavor_text_entries = array_map(fn($flavorText) => new FlavorText($flavorText), $data['flavor_text_entries']);
    }
}
