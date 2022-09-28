<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/division.csv')));

        foreach ($csv as $line) {
            Division::create([
                'id' => $line[0],
                'number' => $line[1],
                'name' => $line[2],
                'start_time' => $line[3],
                'day_of_the_week' => $line[4]
            ]);
        }
    }
}
