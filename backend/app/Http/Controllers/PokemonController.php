<?php

namespace App\Http\Controllers;

use App\Models\Pokemon\Pokemon;
use App\Services\PokemonService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Psy\Util\Json;

class PokemonController extends Controller
{
    private PokemonService $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    /**
     * @throws GuzzleException
     */
    public function index(): JsonResponse
    {
        $pokemons = $this->pokemonService->getAllPokemons();
        return response()->json($pokemons);
    }

    /**
     * @throws GuzzleException
     */
    public function show(int $id) : JsonResponse
    {
        $pokemon = $this->pokemonService->getPokemonById($id);
        return response()->json($pokemon);
    }
}
