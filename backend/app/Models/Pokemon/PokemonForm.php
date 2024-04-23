<?php


namespace App\Models\Pokemon;

use App\Models\Games\Version\VersionGroup;
use App\Models\Pokemon\Forms\PokemonFormType;
use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Name;

class PokemonForm
{
    public int $id;
    public string $name;
    public int $order;
    public int $form_order;
    public bool $is_default;
    public bool $is_battle_only;
    public bool $is_mega;
    public string $form_name;
    public NamedAPIResource $pokemon;
    public array $types;
    public PokemonFormSprites $sprites;
    public NamedAPIResource $version_group;
    public array $names;
    public array $form_names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->order = $data['order'];
        $this->form_order = $data['form_order'];
        $this->is_default = $data['is_default'];
        $this->is_battle_only = $data['is_battle_only'];
        $this->is_mega = $data['is_mega'];
        $this->form_name = $data['form_name'];
        $this->pokemon = new NamedAPIResource($data['pokemon'], Pokemon::class);
        $this->types = array_map(fn($type) => new PokemonFormType($type), $data['types']);
        $this->sprites = new PokemonFormSprites($data['sprites']);
        $this->version_group = new NamedAPIResource($data['version_group'], VersionGroup::class);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
        $this->form_names = array_map(fn($form_name) => new Name($form_name), $data['form_names']);
    }
}
