<?php

namespace App\Models\Pokemon\GrowthRates;

class GrowthRateExperienceLevel
{
    public int $level;
    public int $experience;

    public function __construct($data)
    {
        $this->level = $data['level'];
        $this->experience = $data['experience'];
    }
}
