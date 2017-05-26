<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Sanitize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sanitize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tool for boostrapping the entire app';

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
        $this->call('clear-compiled');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('view:clear');

        if(env('APP_ENV') == 'local'){
            $this->call('migrate:refresh', ['--seed' => true]);
        }

        $this->call('ide-helper:generate');
        $this->call('ide-helper:meta');
        $this->call('ide-helper:models', ['--nowrite' => true]);
        $this->call('optimize');

    }
}
