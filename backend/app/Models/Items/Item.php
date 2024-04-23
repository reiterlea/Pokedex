<?php


namespace App\Models;

use App\Models\Resource\NamedAPIResource;
use App\Models\Resource\APIResource;
use App\Models\Resource\VerboseEffect;
use App\Models\Resource\VersionGroupFlavorText;
use App\Models\Resource\GenerationGameIndex;
use App\Models\Resource\Name;
use App\Models\Resource\ItemSprites;
use App\Models\Resource\ItemHolderPokemon;
use App\Models\Resource\MachineVersionDetail;

class Item
{
    public int $id;
    public string $name;
    public int $cost;
    public int $fling_power;
    public NamedAPIResource $fling_effect;
    public array $attributes;
    public NamedAPIResource $category;
    public array $effect_entries;
    public array $flavor_text_entries;
    public array $game_indices;
    public array $names;
    public ItemSprites $sprites;
    public array $held_by_pokemon;
    public APIResource $baby_trigger_for;
    public array $machines;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->cost = $data['cost'];
        $this->fling_power = $data['fling_power'];
        $this->fling_effect = new NamedAPIResource($data['fling_effect'], ItemFlingEffect::class);
        $this->attributes = array_map(fn($attribute) => new NamedAPIResource($attribute, ItemAttribute::class), $data['attributes']);
        $this->category = new NamedAPIResource($data['category'], ItemCategory::class);
        $this->effect_entries = array_map(fn($effect) => new VerboseEffect($effect), $data['effect_entries']);
        $this->flavor_text_entries = array_map(fn($flavor_text) => new VersionGroupFlavorText($flavor_text), $data['flavor_text_entries']);
        $this->game_indices = array_map(fn($game_index) => new GenerationGameIndex($game_index), $data['game_indices']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->sprites = new ItemSprites($data['sprites']);
        $this->held_by_pokemon = array_map(fn($pokemon) => new ItemHolderPokemon($pokemon), $data['held_by_pokemon']);
        $this->baby_trigger_for = new APIResource($data['baby_trigger_for'], EvolutionChain::class);
        $this->machines = array_map(fn($machine) => new MachineVersionDetail($machine), $data['machines']);
    }
}
