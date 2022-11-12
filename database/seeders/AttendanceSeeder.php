<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendance')->delete();

        $mytime = Carbon::now();
        DB::table('attendance')->insert([
            'id' => 1,
            'tanggal' => Carbon::parse('2022-11-12'),
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('attendance')->insert([
            'id' => 2,
            'tanggal' => Carbon::parse('2022-11-12'),
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
