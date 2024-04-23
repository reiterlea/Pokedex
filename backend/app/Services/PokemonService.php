<?php

namespace App\Services;

use App\Models\Pokemon\Pokemon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PokemonService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function getAllPokemons(): array
    {
        $pokemons = [];
        $response = $this->client->request('GET', 'https://pokeapi.co/api/v2/pokemon');
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['results'] as $pokemon) {
            $pokemons[] = new Pokemon($pokemon);
        }
        return $pokemons;
    }

    /**
     * @throws GuzzleException
     */
    public function getPokemonById(int $id): Pokemon
    {
        $response = $this->client->request('GET', "https://pokeapi.co/api/v2/pokemon/{$id}");
        $data = json_decode($response->getBody()->getContents(), true);
        return new Pokemon($data);
    }
}
