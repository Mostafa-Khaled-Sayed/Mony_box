<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Datanormale;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GainAdjustment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:gain-adjustment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('user_announcement')->delete();
            foreach(User::get() as $user)
            if($user->datanormales_id)
             $user->update([
             'daily_gain'=>(($user->datanormales->final_income/$user->datanormales->final_price) * $user->scores->score),
      'daliy_counter_announce'=>0,
              //this/number =>one video
                ]);
                
    }
}
