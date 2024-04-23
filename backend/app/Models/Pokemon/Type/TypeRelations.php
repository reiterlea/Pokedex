<?php


namespace App\Models\Pokemon\Type;

use App\Models\Resource\NamedAPIResource;

class TypeRelations
{
    public array $no_damage_to;
    public array $half_damage_to;
    public array $double_damage_to;
    public array $no_damage_from;
    public array $half_damage_from;
    public array $double_damage_from;

    public function __construct($data)
    {
        $this->no_damage_to = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['no_damage_to']);
        $this->half_damage_to = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['half_damage_to']);
        $this->double_damage_to = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['double_damage_to']);
        $this->no_damage_from = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['no_damage_from']);
        $this->half_damage_from = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['half_damage_from']);
        $this->double_damage_from = array_map(fn($type) => new NamedAPIResource($type, Type::class), $data['double_damage_from']);
    }
}
