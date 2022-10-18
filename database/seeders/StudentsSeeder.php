<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();

        $mytime = Carbon::now();

        for ($x = 1; $x <= 10; $x++) {

            $gender = '';
            $school = '';

            if($x % 2 == 0){
                $gender = 'perempuan' ;
                $school = 'Tadika Mesra 1';
            }else{
                $gender = 'laki-laki';
                $school = 'Tadika Mesra 1';
            }

            DB::table('students')->insert([
                'id' => $x,
                'name' => 'murid ke ' . $x,
                'gender' => $gender,
                'birth_date' => $mytime,
                'semester' => 1,
                'school' => $school,
                'created_at' => $mytime,
                'updated_at' => $mytime,
            ]);
        }
    }
}
