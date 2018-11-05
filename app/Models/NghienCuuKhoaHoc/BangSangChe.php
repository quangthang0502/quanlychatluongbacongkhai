<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class BangSangChe extends Model
{
    //
    public static function getBangSangCheByYear($universityId, $year)
    {
        return self::where([
            'nam_thong_ke'=> $year,
            'universities_id' => $universityId
        ])->first();
    }
}
