<?php


namespace App\Models\Utility;

use App\Models\Games\Version\Version;
use App\Models\Resource\NamedAPIResource;

class VersionGameIndex
{
    public int $game_index;
    public NamedAPIResource $version;

    public function __construct($data)
    {
        $this->game_index = $data['game_index'];
        $this->version = new NamedAPIResource($data['version'], Version::class);
    }
}
