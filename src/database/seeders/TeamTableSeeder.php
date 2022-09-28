<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/jpa_team.csv')));

        foreach ($csv as $line) {
            Team::create([
                'name_en' => $line[0],
                'name_ja' => $line[1],
                'game_type' => $line[2],
                'store_id' => $line[3],
                'division_id' => $line[4],
                'season_id' => $line[5],
                'memo' => $line[6],
                'bd_flag' => $line[7]
            ]);
        }
    }
}
