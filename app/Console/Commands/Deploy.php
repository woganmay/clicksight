<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all post-deployment steps';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('[Deploy] Running post-deployment tasks');

        $this->runDatabaseMigrations();
        $this->ensureServiceUserExists();

        $this->info('[Deploy] Finished running post-deployment tasks');
    }

    private function runDatabaseMigrations(): void
    {

        $this->info('[runDatabaseMigrations] Running database migrations');

        Artisan::call('migrate', ['--force' => true]);

        $this->info('[runDatabaseMigrations] Finished running database migrations');
    }

    private function ensureServiceUserExists(): void
    {
        try {
            $serviceUser = getServiceUser(true);
            $this->info("[ensureServiceUserExists] Service user exists with ID: {$serviceUser->id}");
        } catch (\Exception $ex) {
            $this->error("[ensureServiceUserExists] Error! " . $ex->getMessage());
        }
    }

}
