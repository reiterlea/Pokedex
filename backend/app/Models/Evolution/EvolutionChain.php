<?php


namespace App\Models\Evolution;

use App\Models\Item;
use App\Models\Resource\NamedAPIResource;
use App\Models\Evolution\ChainLink;

class EvolutionChain
{
    public int $id;
    public NamedAPIResource $baby_trigger_item;
    public ChainLink $chain;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->baby_trigger_item = new NamedAPIResource($data['baby_trigger_item'], Item::class);
        $this->chain = new ChainLink($data['chain']);
    }
}
