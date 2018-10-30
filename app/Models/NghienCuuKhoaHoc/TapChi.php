<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class TapChi extends Model
{
    //
    public static function getSoLuongTapChiByYear($universityId, $year)
    {
        return self::where([
            'nam_thong_ke'=> $year,
            'universities_id' => $universityId
        ])->first();
    }
}
