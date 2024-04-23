<?php


namespace App\Models\Pokemon;

use App\Models\Resource\NamedAPIResource;
use App\Models\Utility\Description;

class Characteristic
{
    public int $id;
    public int $gene_modulo;
    public array $possible_values;
    public NamedAPIResource $highest_stat;
    public array $descriptions;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->gene_modulo = $data['gene_modulo'];
        $this->possible_values = $data['possible_values'];
        $this->highest_stat = new NamedAPIResource($data['highest_stat'], Stat::class);
        $this->descriptions = array_map(fn($description) => new Description($description), $data['descriptions']);
    }
}
