<?php

namespace App\Console\Commands;

use App\Events\CounterAdd;
use Illuminate\Console\Command;

class TestMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counter:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fire event';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        event(new CounterAdd(
            $this->argument('message'))
        );
    }
}
