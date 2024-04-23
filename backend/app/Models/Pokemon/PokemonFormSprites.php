<?php


namespace App\Models\Pokemon;

class PokemonFormSprites
{
    public string $front_default;
    public string $front_shiny;
    public string $back_default;
    public string $back_shiny;

    public function __construct($data)
    {
        $this->front_default = $data['front_default'];
        $this->front_shiny = $data['front_shiny'];
        $this->back_default = $data['back_default'];
        $this->back_shiny = $data['back_shiny'];
    }
}
