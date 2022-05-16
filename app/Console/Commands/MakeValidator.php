<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeValidator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:validator {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Validator creation: ' . $this->argument('name'));

        $tmp = explode('/', $this->argument('name'));

        $destinationPath = app_path('Http') . '/Validator/' . $tmp[0] . '/' . $tmp[1] . '.php';
        dd($destinationPath);

        file_put_contents($destinationPath, 'class' . $tmp[1] . '{}');

        $this->info('Your command has been executed with success!');
    }
}
