<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BangSangCheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bang_sang_ches')->insert([
            'id' => 1,
            'noi_dung' => "may an com",
            'nam_thong_ke' => 2014,
            'universities_id' => 1
        ]);
        DB::table('bang_sang_ches')->insert([
            'id' => 2,
            'noi_dung' => "may cay lua",
            'nam_thong_ke' => 2015,
            'universities_id' => 1
        ]);
        DB::table('bang_sang_ches')->insert([
            'id' => 3,
            'noi_dung' => "may danh nhau",
            'nam_thong_ke' => 2016,
            'universities_id' => 1
        ]);
        DB::table('bang_sang_ches')->insert([
            'id' => 4,
            'noi_dung' => "may code",
            'nam_thong_ke' => 2017,
            'universities_id' => 1
        ]);
        DB::table('bang_sang_ches')->insert([
            'id' => 5,
            'noi_dung' => "may cay asdf",
            'nam_thong_ke' => 2018,
            'universities_id' => 1
        ]);
    }
}
