<?php


namespace App\Models;

use App\Models\Resource\NamedAPIResource;

class Encounter
{
    public int $min_level;
    public int $max_level;
    public array $condition_values;
    public int $chance;
    public NamedAPIResource $method;

    public function __construct($data)
    {
        $this->min_level = $data['min_level'];
        $this->max_level = $data['max_level'];
        $this->condition_values = array_map(fn($condition_value) => new NamedAPIResource($condition_value, EncounterConditionValue::class), $data['condition_values']);
        $this->chance = $data['chance'];
        $this->method = new NamedAPIResource($data['method'], EncounterMethod::class);
    }
}
