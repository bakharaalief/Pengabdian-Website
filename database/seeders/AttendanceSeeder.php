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
            'tanggal' => Carbon::create('2022', '11', '12'),
            'class_id' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('attendance')->insert([
            'id' => 2,
            'tanggal' => Carbon::create('2022', '11', '13'),
            'class_id' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('attendance')->insert([
            'id' => 3,
            'tanggal' => Carbon::create('2022', '11', '12'),
            'class_id' => 2,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('attendance')->insert([
            'id' => 4,
            'tanggal' => Carbon::create('2022', '11', '13'),
            'class_id' => 2,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
