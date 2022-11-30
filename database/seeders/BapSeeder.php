<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('baps')->delete();

        $mytime = Carbon::now();
        DB::table('baps')->insert([
            'id' => 1,
            'materi' => 'Membaca (guru)',
            'keterangan' => 'Membaca bersama-sama dan menulis pegon sambung dan putus',
            'guru' => '2',
            'tanggal' => '2022-11-30',
            'class_id' => '1',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('baps')->insert([
            'id' => 2,
            'materi' => 'Membaca (admin)',
            'keterangan' => 'Membaca bersama-sama dan menulis pegon sambung dan putus',
            'guru' => '1',
            'tanggal' => '2022-11-30',
            'class_id' => '2',
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
