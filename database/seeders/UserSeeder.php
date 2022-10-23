<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $mytime = Carbon::now();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'username' => 'admin123',
            'password' => bcrypt('admin123'),
            'user_level' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
