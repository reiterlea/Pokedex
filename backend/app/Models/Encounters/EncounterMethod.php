<?php


namespace App\Models\Encounters;

use App\Models\Utility\Name;

class EncounterMethod
{
    public int $id;
    public string $name;
    public int $order;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
