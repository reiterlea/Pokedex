<?php


namespace App\Models\Pokemon;

use App\Models\Locations\PalParkArea;
use App\Models\Resource\NamedAPIResource;

class PalParkEncounterArea
{
    public int $base_score;
    public int $rate;
    public NamedAPIResource $area;

    public function __construct($data)
    {
        $this->base_score = $data['base_score'];
        $this->rate = $data['rate'];
        $this->area = new NamedAPIResource($data['area'], PalParkArea::class);
    }
}
