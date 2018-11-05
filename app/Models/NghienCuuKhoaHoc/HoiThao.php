<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class HoiThao extends Model
{
    //
    public static function getSoLuongHoiThaoByYear($universityId, $year)
    {
        return self::where([
            'nam_thong_ke'=> $year,
            'universities_id' => $universityId
        ])->first();
    }
}
