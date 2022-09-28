<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use SplFileObject;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $csv = Reader::createFromFileObject(new SplFileObject(app_path('../database/seeders/csv/users.csv')));

        foreach ($csv as $line) {
            User::create([
                'name' => $line[0],
                'email' => $line[1],
                'password' => bcrypt($line[2]),
                'role' => $line[3],
            ]);
        }
    }
}
