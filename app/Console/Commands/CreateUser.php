<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Laravel:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Default User';

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
        $name = $this->ask("What is ur name?");
        $email = $this->ask("Input your email");
        $password = $this->secret("And the last one, ur password!");
        $this->line("User : {$name} <{$email}>");

        if ($this->confirm("Continue?")) {
            $user = new User();

            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);

            $user->save();
            $this->info('User has been created!');
        } else {
            $this->error('canceled');
        }

        $this->line('Done!');
        
    }
}
