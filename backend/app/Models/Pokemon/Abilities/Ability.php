<?php


namespace App\Models\Pokemon\Abilities;

use App\Models\Games\Generations\Generation;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;
use App\Models\Utility\VerboseEffect;

class Ability
{
    public int $id;
    public string $name;
    public bool $is_main_series;
    public NamedAPIResource $generation;
    public array $names;
    public array $effect_entries;
    public array $effect_changes;
    public array $flavor_text_entries;
    public array $pokemon;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->is_main_series = $data['is_main_series'];
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->effect_entries = array_map(fn($effect) => new VerboseEffect($effect), $data['effect_entries']);
        $this->effect_changes = array_map(fn($change) => new AbilityEffectChange($change), $data['effect_changes']);
        $this->flavor_text_entries = array_map(fn($entry) => new AbilityFlavorText($entry), $data['flavor_text_entries']);
        $this->pokemon = array_map(fn($pokemon) => new AbilityPokemon($pokemon), $data['pokemon']);
    }
}
