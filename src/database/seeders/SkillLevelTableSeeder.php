<?php

namespace Database\Seeders;

use App\Models\SkillLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class SkillLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_levels')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/skill_level.csv')));

        foreach ($csv as $line) {
            SkillLevel::create([
                'game_type' => $line[0],
                'skill_level' => $line[1],
                'point' => $line[2]
            ]);
        }
    }
}
