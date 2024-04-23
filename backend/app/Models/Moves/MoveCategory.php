<?php


namespace App\Models\Moves;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Description;

class MoveCategory
{
    public int $id;
    public string $name;
    public array $moves;
    public array $descriptions;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->moves = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['moves']);
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
    }
}
