<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students_classes')->delete();

        $mytime = Carbon::now();

        DB::table('students_classes')->insert([
            'id' => 1,
            'student' => 1,
            'class' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('students_classes')->insert([
            'id' => 2,
            'student' => 2,
            'class' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('students_classes')->insert([
            'id' => 3,
            'student' => 3,
            'class' => 1,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('students_classes')->insert([
            'id' => 4,
            'student' => 4,
            'class' => 2,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('students_classes')->insert([
            'id' => 5,
            'student' => 5,
            'class' => 2,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('students_classes')->insert([
            'id' => 6,
            'student' => 6,
            'class' => 2,
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
