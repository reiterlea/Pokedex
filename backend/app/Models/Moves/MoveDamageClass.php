<?php


namespace App\Models\Moves;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Description;
use App\Models\Utility\Name;

class MoveDamageClass
{
    public int $id;
    public string $name;
    public array $descriptions;
    public array $moves;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
        $this->moves = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['moves']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
