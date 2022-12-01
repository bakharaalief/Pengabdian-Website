<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserLevelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(StudyTimeSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(StudentClassSeeder::class);
    //     $this->call(AttendanceSeeder::class);
    //     $this->call(AttendanceStudentSeeder::class);
        $this->call(BapSeeder::class);
    //     $this->call(AttendanceSeeder::class);
    //     $this->call(AttendanceStudentSeeder::class);
    }
}
