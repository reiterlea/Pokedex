<?php


namespace App\Models\Berries;

use App\Models\Item;
use App\Models\Pokemon\Type\Type;
use App\Models\Resource\NamedAPIResource;

class Berry
{
    public int $id;
    public string $name;
    public int $growth_time;
    public int $max_harvest;
    public int $natural_gift_power;
    public int $size;
    public int $smoothness;
    public int $soil_dryness;
    public NamedAPIResource $firmness;
    public array $flavors;
    public NamedAPIResource $item;
    public NamedAPIResource $natural_gift_type;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->growth_time = $data['growth_time'];
        $this->max_harvest = $data['max_harvest'];
        $this->natural_gift_power = $data['natural_gift_power'];
        $this->size = $data['size'];
        $this->smoothness = $data['smoothness'];
        $this->soil_dryness = $data['soil_dryness'];
        $this->firmness = new NamedAPIResource($data['firmness'], BerryFirmness::class);
        $this->flavors = array_map(fn($flavor) => new BerryFlavorMap($flavor), $data['flavors']);
        $this->item = new NamedAPIResource($data['item'], Item::class);
        $this->natural_gift_type = new NamedAPIResource($data['natural_gift_type'], Type::class);
    }
}
