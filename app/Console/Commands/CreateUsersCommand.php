<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class CreateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users {users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        parent::__construct();
    }*/

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$user = User::create([
            'fName' => $this->argument('fName'),
            'lName' => $this->argument('lName')
        ]);*/
        $users = $this->argument('users');
        for ($i=0; $i < $users; $i++) { 
            factory(\App\User::class)->create();
        }
        

        //$this->info("Added " . $user->fName . " " . $user->lName);
    }
}
