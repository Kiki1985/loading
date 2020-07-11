<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Subscription;

class createSubscriptionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_subscriptions{subscriptions}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new subscriptions';

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
        $subscriptions = $this->argument('subscriptions');
        for ($i=0; $i < $subscriptions; $i++) { 
            factory(\App\Subscription::class)->create();
        }
    }
}
