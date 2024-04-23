<?php


namespace App\Models\Item;

class ItemSprites
{
    public string $default;

    public function __construct($data)
    {
        $this->default = $data['default'];
    }
}
