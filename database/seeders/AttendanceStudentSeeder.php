<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendance_students')->delete();

        $mytime = Carbon::now();
        DB::table('attendance_students')->insert([
            'attendance_id' => 1,
            'student_id' => 1,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);

        DB::table('attendance_students')->insert([
            'attendance_id' => 1,
            'student_id' => 2,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);

        DB::table('attendance_students')->insert([
            'attendance_id' => 1,
            'student_id' => 3,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);

        DB::table('attendance_students')->insert([
            'attendance_id' => 2,
            'student_id' => 1,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);

        DB::table('attendance_students')->insert([
            'attendance_id' => 2,
            'student_id' => 2,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);

        DB::table('attendance_students')->insert([
            'attendance_id' => 2,
            'student_id' => 3,
            'created_at' => $mytime,
            'updated_at' =>$mytime
        ]);
    }
}
