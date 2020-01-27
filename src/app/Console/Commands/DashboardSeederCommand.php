<?php

namespace Anam\Dashboard\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DashboardSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:dash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the package Seeders';

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
     * @return mixed
     */
    public function handle()
    {
        Log::info("seed:dash Command is working fine!");
        $this->info('Dashboard Database seeding completed successfully.');
    }
}
