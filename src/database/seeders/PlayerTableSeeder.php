<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\SkillLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/player.csv')));

        foreach ($csv as $line) {
            $skillLevel = SkillLevel::query()->where('skill_level', $line[3])->first();
            Player::create([
                'user_id' => $line[0],
                'name' => $line[1],
                'number' => $line[2],
                'skill_level_id' => $skillLevel->id,
                'bd_flg' => $line[4]
            ]);
        }
    }
}
