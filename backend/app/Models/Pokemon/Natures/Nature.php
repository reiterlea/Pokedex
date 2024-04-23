<?php


namespace App\Models\Pokemon\Natures;

use App\Models\Berries\BerryFlavor;
use App\Models\Resource\NamedAPIResource;
use App\Models\Stat;
use App\Models\Utility\Name;

class Nature
{
    public int $id;
    public string $name;
    public NamedAPIResource $decreased_stat;
    public NamedAPIResource $increased_stat;
    public NamedAPIResource $hates_flavor;
    public NamedAPIResource $likes_flavor;
    public array $pokeathlon_stat_changes;
    public array $move_battle_style_preferences;
    public array $names;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->decreased_stat = new NamedAPIResource($data['decreased_stat'], Stat::class);
        $this->increased_stat = new NamedAPIResource($data['increased_stat'], Stat::class);
        $this->hates_flavor = new NamedAPIResource($data['hates_flavor'], BerryFlavor::class);
        $this->likes_flavor = new NamedAPIResource($data['likes_flavor'], BerryFlavor::class);
        $this->pokeathlon_stat_changes = array_map(fn($change) => new NatureStatChange($change), $data['pokeathlon_stat_changes']);
        $this->move_battle_style_preferences = array_map(fn($preference) => new MoveBattleStylePreference($preference), $data['move_battle_style_preferences']);
        $this->names = array_map(fn($name) => new Name($name), $data['names']);
    }
}
