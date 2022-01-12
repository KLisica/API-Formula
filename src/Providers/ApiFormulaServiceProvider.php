<?php

namespace KLisica\ApiFormula\Providers;

use Illuminate\Support\ServiceProvider;

// Commands.
use KLisica\ApiFormula\Commands\SetupFormula;
use KLisica\ApiFormula\Commands\CreateFormula;
use KLisica\ApiFormula\Commands\CreateModel;
use KLisica\ApiFormula\Commands\CreateRepository;
use KLisica\ApiFormula\Commands\CreateRepositoryInterface;

class ApiFormulaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        // Registering commands.
        $this->commands([
            SetupFormula::class,
            CreateFormula::class,

            // Sub-commands.
            CreateModel::class,
            CreateRepositoryInterface::class,
            CreateRepository::class,
        ]);
    }
}