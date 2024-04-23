<?php


namespace App\Models\Encounters;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class EncounterConditionValue
{
    public int $id;
    public string $name;
    public NamedAPIResource $condition;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->condition = new NamedAPIResource($data['condition'], EncounterCondition::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
