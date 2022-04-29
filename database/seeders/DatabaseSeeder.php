<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([AccountTableSeeder::class]); 
        $this->call([AreaRegionTableSeeder::class]); 
        $this->call([AreaProvinceTableSeeder::class]); 
        $this->call([CatelogTableSeeder::class]); 
    }
}
