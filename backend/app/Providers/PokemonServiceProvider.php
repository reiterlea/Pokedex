<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class PokemonServiceProvider extends ServiceProvider
{
    public
    function register(): void
    {
        $this->app->bind(PokemonService::class, function ($app) {
            return new PokemonService();
        });
    }
}
