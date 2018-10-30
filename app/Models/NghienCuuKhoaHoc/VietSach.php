<?php

namespace App\Models\NghienCuuKhoaHoc;

use Illuminate\Database\Eloquent\Model;

class VietSach extends Model
{
    //
    public static function getSoLuongSachByYear($universityId, $year)
    {
        return self::where([
            'nam_thong_ke'=> $year,
            'universities_id' => $universityId
        ])->first();
    }
}
