<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Vacancy;

class DropIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vacancy:drop-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop index';

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
        Vacancy::deleteIndex();
    }
}
