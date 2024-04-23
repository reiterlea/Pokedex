<?php


namespace App\Models\Pokemon\Type;

use App\Models\Games\Generations\Generation;
use App\Models\Resource\NamedAPIResource;

class TypeRelationsPast
{
    public NamedAPIResource $generation;
    public TypeRelations $damage_relations;

    public function __construct($data)
    {
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->damage_relations = new TypeRelations($data['damage_relations']);
    }
}
