<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_level')->delete();

        $mytime = Carbon::now();
        DB::table('user_level')->insert([
            'id' => 1,
            'name' => 'admin',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('user_level')->insert([
            'id' => 2,
            'name' => 'guru',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('user_level')->insert([
            'id' => 3,
            'name' => 'sukarelawan',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
