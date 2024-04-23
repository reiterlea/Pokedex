<?php


namespace App\Models\Moves;

use App\Models\Contests\ContestComboSets;
use App\Models\Contests\ContestEffect;
use App\Models\Contests\ContestType;
use App\Models\Contests\SuperContestEffect;
use App\Models\Games\Generations\Generation;
use App\Models\Items\MachineVersionDetail;
use App\Models\Pokemon\Pokemon;
use App\Models\Pokemon\Type\Type;
use App\Models\Resource\APIResource;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\AbilityEffectChange;
use App\Models\Utility\Name;
use App\Models\Utility\VerboseEffect;

class Move
{
    public int $id;
    public string $name;
    public int $accuracy;
    public int $effect_chance;
    public int $pp;
    public int $priority;
    public int $power;
    public ContestComboSets $contest_combos;
    public NamedAPIResource $contest_type;
    public APIResource $contest_effect;
    public NamedAPIResource $damage_class;
    public array $effect_entries;
    public array $effect_changes;
    public array $learned_by_pokemon;
    public array $flavor_text_entries;
    public NamedAPIResource $generation;
    public array $machines;
    public MoveMetaData $meta;
    public array $names;
    public array $past_values;
    public array $stat_changes;
    public APIResource $super_contest_effect;
    public NamedAPIResource $target;
    public NamedAPIResource $type;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->accuracy = $data['accuracy'];
        $this->effect_chance = $data['effect_chance'];
        $this->pp = $data['pp'];
        $this->priority = $data['priority'];
        $this->power = $data['power'];
        $this->contest_combos = new ContestComboSets($data['contest_combos']);
        $this->contest_type = new NamedAPIResource($data['contest_type'], ContestType::class);
        $this->contest_effect = new APIResource($data['contest_effect'], ContestEffect::class);
        $this->damage_class = new NamedAPIResource($data['damage_class'], MoveDamageClass::class);
        $this->effect_entries = array_map(fn($effect) => new VerboseEffect($effect), $data['effect_entries']);
        $this->effect_changes = array_map(fn($change) => new AbilityEffectChange($change), $data['effect_changes']);
        $this->learned_by_pokemon = array_map(fn($pokemon) => new NamedAPIResource($pokemon, Pokemon::class), $data['learned_by_pokemon']);
        $this->flavor_text_entries = array_map(fn($text) => new MoveFlavorText($text), $data['flavor_text_entries']);
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->machines = array_map(fn($machine) => new MachineVersionDetail($machine), $data['machines']);
        $this->meta = new MoveMetaData($data['meta']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->past_values = array_map(fn($value) => new PastMoveStatValues($value), $data['past_values']);
        $this->stat_changes = array_map(fn($change) => new MoveStatChange($change), $data['stat_changes']);
        $this->super_contest_effect = new APIResource($data['super_contest_effect'], SuperContestEffect::class);
        $this->target = new NamedAPIResource($data['target'], MoveTarget::class);
        $this->type = new NamedAPIResource($data['type'], Type::class);
    }
}
