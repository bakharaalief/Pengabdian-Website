<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->delete();

        $mytime = Carbon::now();
        DB::table('classes')->insert([
            'id' => 1,
            'name' => 'kelas 1',
            'study_time' => 1,
            'tahun_ajaran' => '2019/2020',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('classes')->insert([
            'id' => 2,
            'name' => 'kelas 2',
            'study_time' => 2,
            'tahun_ajaran' => '2019/2020',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
