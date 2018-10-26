<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NckhNghiemThuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nckh_nghiem_thus')->insert([
            'id' => 1,
            'nam_thong_ke' => 2014,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('nckh_nghiem_thus')->insert([
            'id' => 2,
            'nam_thong_ke' => 2015,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('nckh_nghiem_thus')->insert([
            'id' => 3,
            'nam_thong_ke' => 2016,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('nckh_nghiem_thus')->insert([
            'id' => 4,
            'nam_thong_ke' => 2017,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('nckh_nghiem_thus')->insert([
            'id' => 5,
            'nam_thong_ke' => 2018,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
    }
}
