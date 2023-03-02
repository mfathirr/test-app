<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaravelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:basic 
                            {argument : ini adalah deskripsi argument}
                            {--o|opsi= : ini adalah deskripsi opsi}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel basic command';

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
     * @return int
     */
    public function handle()
    {
        $this->info("Informasi yang muncul dalam terminal");
        $this->error("Terjadi error, silahkan coba lagi");
        $this->line("Display this on screen");

        // $this->line(print_r($this->option()) . ' ' . print_r($this->arguments()));
        $this->line($this->argument('argument') . ' ' . $this->option('opsi'));

        $name = $this->ask('what is your name?');
        $password = $this->secret('input your password');

        if ($this->confirm('wanna see whats behind this shirt?')) {
            $this->line($name . ' ' . $password);
        }
    }
}
