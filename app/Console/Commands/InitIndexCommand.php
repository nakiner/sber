<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Vacancy;

class InitIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacancy:init-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start up index and load elements';

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
        Vacancy::createIndex($shards = null, $replicas = null);
        Vacancy::putMapping($ignoreConflicts = true);
        Vacancy::addAllToIndex();
        return true;
    }
}
