<?php


namespace App\Models\Berries;

use App\Models\Resource\NamedAPIResource;

class FlavorBerryMap
{
    public int $potency;
    public NamedAPIResource $berry;

    public function __construct($data)
    {
        $this->potency = $data['potency'];
        $this->berry = new NamedAPIResource($data['berry'], Berry::class);
    }
}
