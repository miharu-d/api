<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/store.csv')));

        foreach ($csv as $line) {
            Store::create([
                'name' => $line[0],
                'access' => $line[1],
                'jpa_fee' => $line[2],
                'price' => $line[3],
                'open_time' => $line[4],
                'memo' => $line[5]
            ]);
        }
    }
}
