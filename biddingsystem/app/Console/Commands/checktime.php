<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class checktime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Time';

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
        //
        $main=new mainController();
        $main->checkTime();

    }
}
