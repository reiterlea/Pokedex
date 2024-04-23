<?php

namespace App\Models\Pokemon;

use App\Models\Pokemon\Forms\PokemonForm;
use App\Models\Resource\NamedAPIResource;
use GuzzleHttp\Exception\GuzzleException;

class Pokemon
{
    public int $id;
    public string $name;
    public int $base_experience;
    public int $height;
    public bool $is_default;
    public int $order;
    public int $weight;
    public array $abilities;
    public array $forms;
    public array $game_indices;
    public array $held_items;
    public string $location_area_encounters;
    public array $moves;
    public array $past_types;
    public array $sprites;
    public array $cries;
    public array $species;
    public array $stats;
    public array $types;

    /**
     * @throws GuzzleException
     */
    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->base_experience = $data['base_experience'];
        $this->height = $data['height'];
        $this->is_default = $data['is_default'];
        $this->order = $data['order'];
        $this->weight = $data['weight'];
        $this->abilities = array_map(fn($ability) => new PokemonAbility($ability), $data['abilities']);
        $this->forms = array_map(fn($form) => (new NamedAPIResource($form, PokemonForm::class))->getResource(), $data['forms']);
        $this->game_indices = $data['game_indices'];
        $this->held_items = $data['held_items'];
        $this->location_area_encounters = $data['location_area_encounters'];
        $this->moves = $data['moves'];
        $this->past_types = $data['past_types'];
        $this->sprites = $data['sprites'];
        $this->cries = $data['cries'];
        $this->species = $data['species'];
        $this->stats = $data['stats'];
        $this->types = $data['types'];
    }
}
