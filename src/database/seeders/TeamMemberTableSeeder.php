<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class TeamMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_members')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/jpa_team_member.csv')));

        foreach ($csv as $line) {
            TeamMember::create([
                'team_id' => $line[0],
                'player_id' => $line[1],
                'helper_flag' => $line[2],
            ]);
        }
    }
}
