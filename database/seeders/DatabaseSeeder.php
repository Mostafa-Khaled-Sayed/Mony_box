<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UserSeeder::class,
            //SettingSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            UserSeeder::class,
            TaxruleSeeder::class
        ]);
        $this->call(\Lwwcas\LaravelCountries\Database\Seeders\LcDatabaseSeeder::class);
    }
}
