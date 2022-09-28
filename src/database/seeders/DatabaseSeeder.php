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
        $this->call(SkillLevelTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(DivisionTableSeeder::class);
        $this->call(AwardTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(PlayerTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TeamMemberTableSeeder::class);
    }
}
