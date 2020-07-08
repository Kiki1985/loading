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
    protected $signature = 'create:users';

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
        $user = User::create([
            'fName' => 'Miroslav',
            'lName' => 'Dojcinovic'
        ]);

        $this->info("Added " . $user->fName . " " . $user->lName);
    }
}
