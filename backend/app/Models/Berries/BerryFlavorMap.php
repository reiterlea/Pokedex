<?php


namespace App\Models\Berries;

use App\Models\Resource\NamedAPIResource;

class BerryFlavorMap
{
    public int $potency;
    public NamedAPIResource $flavor;

    public function __construct($data)
    {
        $this->potency = $data['potency'];
        $this->flavor = new NamedAPIResource($data['flavor'], BerryFlavor::class);
    }
}
