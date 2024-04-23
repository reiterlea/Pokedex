<?php


namespace App\Models\Evolution;

use App\Models\Item;
use App\Models\Pokemon\PokemonSpecies;
use App\Models\Pokemon\Type\Type;
use App\Models\Resource\NamedAPIResource;

class EvolutionDetail
{
    public NamedAPIResource $item;
    public NamedAPIResource $trigger;
    public int $gender;
    public NamedAPIResource $held_item;
    public NamedAPIResource $known_move;
    public NamedAPIResource $known_move_type;
    public NamedAPIResource $location;
    public int $min_level;
    public int $min_happiness;
    public int $min_beauty;
    public int $min_affection;
    public bool $needs_overworld_rain;
    public NamedAPIResource $party_species;
    public NamedAPIResource $party_type;
    public int $relative_physical_stats;
    public string $time_of_day;
    public NamedAPIResource $trade_species;
    public bool $turn_upside_down;

    public function __construct($data)
    {
        $this->item = new NamedAPIResource($data['item'], Item::class);
        $this->trigger = new NamedAPIResource($data['trigger'], EvolutionTrigger::class);
        $this->gender = $data['gender'];
        $this->held_item = new NamedAPIResource($data['held_item'], Item::class);
        $this->known_move = new NamedAPIResource($data['known_move'], Move::class);
        $this->known_move_type = new NamedAPIResource($data['known_move_type'], Type::class);
        $this->location = new NamedAPIResource($data['location'], Location::class);
        $this->min_level = $data['min_level'];
        $this->min_happiness = $data['min_happiness'];
        $this->min_beauty = $data['min_beauty'];
        $this->min_affection = $data['min_affection'];
        $this->needs_overworld_rain = $data['needs_overworld_rain'];
        $this->party_species = new NamedAPIResource($data['party_species'], PokemonSpecies::class);
        $this->party_type = new NamedAPIResource($data['party_type'], Type::class);
        $this->relative_physical_stats = $data['relative_physical_stats'];
        $this->time_of_day = $data['time_of_day'];
        $this->trade_species = new NamedAPIResource($data['trade_species'], PokemonSpecies::class);
        $this->turn_upside_down = $data['turn_upside_down'];
    }
}
