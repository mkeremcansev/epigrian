<?php

namespace App\Console\Commands;

use App\Events\SwapiDataFetchEvent;
use Illuminate\Console\Command;

class SwapiDataFetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All API`s data check';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        event(new SwapiDataFetchEvent());
        $this->info('Data fetched successfully');
    }
}
