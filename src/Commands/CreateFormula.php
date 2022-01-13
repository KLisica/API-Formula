<?php

namespace KLisica\ApiFormula\Commands;

use Illuminate\Console\Command;

class CreateFormula extends Command
{
    protected $signature    = 'api-make:formula';
    protected $description  = 'API Formula root command for scaffolding complete flow.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("📝 Setting up recipe for API-Formula:");

        $modelChoices = ['Create new', 'Use existing'];
        $modelChoice = $this->choice(
            'Create new model or use existing?',
            ['Create new', 'Use existing'],
            0
        );

        if ($modelChoices[0] == $modelChoice) {
            // Create new model.
            $modelName = $this->ask('Write new model name:');
            $this->call('api-make:model', ['name' => $modelName]);
        } else {
            // Use existing model.
            $modelName = $this->ask('Write existing model name:');
        }

        // Create repository and related interface.
        $this->call('api-make:repository', [
            'name' => $modelName . 'Repository',
            '--model' => $modelName
        ]);

        return 0;
    }
}
