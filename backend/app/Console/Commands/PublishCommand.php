<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use phpcent\Client;

class PublishCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'publishCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "sheduler";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        while (true) {
            sleep(10);
        }
    }
}
