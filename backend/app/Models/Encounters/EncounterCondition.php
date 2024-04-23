<?php


namespace App\Models\Encounters;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class EncounterCondition
{
    public int $id;
    public string $name;
    public array $names;
    public array $values;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->values = array_map(fn($value) => new NamedAPIResource($value, EncounterConditionValue::class), $data['values']);
    }
}
