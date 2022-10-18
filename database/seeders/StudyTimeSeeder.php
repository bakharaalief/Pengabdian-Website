<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_time')->delete();

        $mytime = Carbon::now();
        DB::table('study_time')->insert([
            'id' => 1,
            'name' => 'sore',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('study_time')->insert([
            'id' => 2,
            'name' => 'maghrib',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

    }
}
