<?php


namespace App\Models\Pokemon;

use App\Models\Description;
use App\Models\EvolutionChain;
use App\Models\FlavorText;
use App\Models\Games\Generations\Generation;
use App\Models\Genus;
use App\Models\PalParkEncounterArea;
use App\Models\Pokemon\GrowthRates\GrowthRate;
use App\Models\PokemonColor;
use App\Models\PokemonHabitat;
use App\Models\PokemonShape;
use App\Models\PokemonSpeciesDexEntry;
use App\Models\PokemonSpeciesVariety;
use App\Models\Resource\APIResource;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class PokemonSpecies
{
    public int $id;
    public string $name;
    public int $order;
    public int $gender_rate;
    public int $capture_rate;
    public int $base_happiness;
    public bool $is_baby;
    public bool $is_legendary;
    public bool $is_mythical;
    public int $hatch_counter;
    public bool $has_gender_differences;
    public bool $forms_switchable;
    public NamedAPIResource $growth_rate;
    public array $pokedex_numbers;
    public array $egg_groups;
    public NamedAPIResource $color;
    public NamedAPIResource $shape;
    public NamedAPIResource $evolves_from_species;
    public APIResource $evolution_chain;
    public NamedAPIResource $habitat;
    public NamedAPIResource $generation;
    public array $names;
    public array $pal_park_encounters;
    public array $flavor_text_entries;
    public array $form_descriptions;
    public array $genera;
    public array $varieties;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->gender_rate = $data['gender_rate'];
        $this->capture_rate = $data['capture_rate'];
        $this->base_happiness = $data['base_happiness'];
        $this->is_baby = $data['is_baby'];
        $this->is_legendary = $data['is_legendary'];
        $this->is_mythical = $data['is_mythical'];
        $this->hatch_counter = $data['hatch_counter'];
        $this->has_gender_differences = $data['has_gender_differences'];
        $this->forms_switchable = $data['forms_switchable'];
        $this->growth_rate = new NamedAPIResource($data['growth_rate'], GrowthRate::class);
        $this->pokedex_numbers = array_map(fn($entry) => new PokemonSpeciesDexEntry($entry), $data['pokedex_numbers']);
        $this->egg_groups = array_map(fn($group) => new NamedAPIResource($group, EggGroup::class), $data['egg_groups']);
        $this->color = new NamedAPIResource($data['color'], PokemonColor::class);
        $this->shape = new NamedAPIResource($data['shape'], PokemonShape::class);
        $this->evolves_from_species = new NamedAPIResource($data['evolves_from_species'], PokemonSpecies::class);
        $this->evolution_chain = new APIResource($data['evolution_chain'], EvolutionChain::class);
        $this->habitat = new NamedAPIResource($data['habitat'], PokemonHabitat::class);
        $this->generation = new NamedAPIResource($data['generation'], Generation::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->pal_park_encounters = array_map(fn($encounter) => new PalParkEncounterArea($encounter), $data['pal_park_encounters']);
        $this->flavor_text_entries = array_map(fn($entry) => new FlavorText($entry), $data['flavor_text_entries']);
        $this->form_descriptions = array_map(fn($description) => new Description($description), $data['form_descriptions']);
        $this->genera = array_map(fn($genus) => new Genus($genus), $data['genera']);
        $this->varieties = array_map(fn($variety) => new PokemonSpeciesVariety($variety), $data['varieties']);
    }
}
