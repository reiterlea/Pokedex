<?php


namespace App\Models\Moves;

use App\Models\Utility\Name;

class MoveBattleStyle
{
    public int $id;
    public string $name;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
