<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoiThaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hoi_thaos')->insert([
            'id' => 1,
            'trong_nuoc' => 10,
            'quoc_te' => 20,
            'cap_truong' => 50,
            'nam_thong_ke' => 2014,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('hoi_thaos')->insert([
            'id' => 2,
            'trong_nuoc' => 3,
            'quoc_te' => 12,
            'cap_truong' => 46,
            'nam_thong_ke' => 2015,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('hoi_thaos')->insert([
            'id' => 3,
            'trong_nuoc' => 10,
            'quoc_te' => 20,
            'cap_truong' => 50,
            'nam_thong_ke' => 2016,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('hoi_thaos')->insert([
            'id' => 4,
            'trong_nuoc' => 15,
            'quoc_te' => 24,
            'cap_truong' => 52,
            'nam_thong_ke' => 2017,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
        DB::table('hoi_thaos')->insert([
            'id' => 5,
            'trong_nuoc' => 110,
            'quoc_te' => 120,
            'cap_truong' => 150,
            'nam_thong_ke' => 2018,
            'sl_theo_can_bo' => '10',
            'universities_id' => 1
        ]);
    }
}
