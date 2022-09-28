<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class AwardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('awards')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/award.csv')));

        foreach ($csv as $line) {
            Award::create([
                'type' => $line[0],
                'name' => $line[1],
                'memo' => $line[2]
            ]);
        }
    }
}
