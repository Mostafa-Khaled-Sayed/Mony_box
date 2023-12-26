<?php

namespace Database\Seeders;

use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        $user=User::create([
            'name' => "12345678",
            'email' => "12345678@gmail.com",
            'phone' => "12345678",
            'password' => Hash::make("12345678"),
            'code_invention' => "12345678",
            "score"=>10,
        ]);
        Score::create(['score'=>10,
        "user_id"=> $user->id,
    ]);
    }
}
