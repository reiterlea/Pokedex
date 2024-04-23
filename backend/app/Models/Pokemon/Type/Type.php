<?php


namespace App\Models\Pokemon\Type;

use App\Models\Games\Generations\Generation;
use App\Models\MoveDamageClass;
use App\Models\Resource\NamedAPIResource;

class Type
{
    public int $id;
    public string $name;
    public TypeRelations $damage_relations;
    public array $past_damage_relations;
    public array $game_indices;
    public NamedAPIResource $generation;
    public NamedAPIResource $move_damage_class;
    public array $names;
    public array $pokemon;
    public array $moves;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->damage_relations = new TypeRelations($data['damage_relations']);
        $this->past_damage_relations = array_map(fn($relation) => new TypeRelationsPast($relation), $data['past_damage_relations']);
        $this->game_indices = array_map(fn($index) => new GenerationGameIndex($index), $data['game_indices']);
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->move_damage_class = new NamedAPIResource($data['move_damage_class'], MoveDamageClass::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pokemon = array_map(fn($pokemon) => new TypePokemon($pokemon), $data['pokemon']);
        $this->moves = array_map(fn($move) => new NamedAPIResource($move, Move::class), $data['moves']);
    }
}
