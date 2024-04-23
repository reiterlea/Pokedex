<?php


namespace App\Models\Moves;


class ContestComboSets
{
    public ContestComboDetail $normal;
    public ContestComboDetail $super;

    public function __construct($data)
    {
        $this->normal = new ContestComboDetail($data['normal']);
        $this->super = new ContestComboDetail($data['super']);
    }
}
