<?php


namespace App\Models\Items;

use App\Models\Games\Version\VersionGroup;
use App\Models\Item;
use App\Models\Resource\NamedAPIResource;

class Machine
{
    public int $id;
    public NamedAPIResource $item;
    public NamedAPIResource $move;
    public NamedAPIResource $version_group;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->item = new NamedAPIResource($data['item'], Item::class);
        $this->move = new NamedAPIResource($data['move'], Move::class);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
    }
}
