<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCustomCommand extends Command
{
    // The name and signature of the console command.
    protected $signature = 'custom:my-command {name?}';

    // The console command description.
    protected $description = 'This is a custom command that performs a specific task';

    // Execute the console command.
    public function handle()
    {
        $name = $this->argument('name') ?? 'world';
        $this->info("Hello, {$name}!");
        
        // Add your custom logic here.
    }
}
