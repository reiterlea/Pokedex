<?php


namespace App\Models\Pokemon;

class PokemonSprites
{
    public ?string $front_default;
    public ?string $front_shiny;
    public ?string $front_female;
    public ?string $front_shiny_female;
    public ?string $back_default;
    public ?string $back_shiny;
    public ?string $back_female;
    public ?string $back_shiny_female;

    public function __construct($data)
    {
        $this->front_default = $data['front_default'] ?? null;
        $this->front_shiny = $data['front_shiny'] ?? null;
        $this->front_female = $data['front_female'] ?? null;
        $this->front_shiny_female = $data['front_shiny_female'] ?? null;
        $this->back_default = $data['back_default'] ?? null;
        $this->back_shiny = $data['back_shiny'] ?? null;
        $this->back_female = $data['back_female'] ?? null;
        $this->back_shiny_female = $data['back_shiny_female'] ?? null;
    }
}
