<?php

use App\Models\University;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    User::create([
	    	'name' => "Nguyễn Sỹ Quang Thắng",
		    'email' => 'admin@admin.com',
		    'password' => bcrypt('123456'),
			'role' => Role::getRole(0)
	    ]);

	    User::create([
		    'name' => "Nguyễn Sỹ Quang Thắng 1",
		    'email' => 'client@admin.com',
		    'password' => bcrypt('123456'),
		    'role' => Role::getRole(0),
		    'type' => 2
	    ]);

	    University::create([
	    	'vi_ten' => "Đại học công nghệ",
		    'en_ten' => 'University of Engineering and Technology',
		    'vi_viet_tat' => 'DHCN-DHQGHN',
		    'en_viet_tat' => 'UET',
		    'ten_cu' => 'Khoa Công nghệ của Trường Đại học Khoa học Tự nhiên',
		    'co_quan' => 'Đại học quốc gia Hà Nội',
		    'dia_chi' => 'E3, 144 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội',
		    'dien_thoai' => '024 3754 7461',
		    'fax' => '024.37547.460',
		    'email' => 'uet@vnu.edu.vn',
		    'website' => 'https://uet.vnu.edu.vn/',
		    'nam_thanh_lap' => new DateTime('2000/10/19'),
		    'loai_hinh_dao_tao' => 'Chính quy',
		    'slug' => str_slug("Đại học công nghệ")
	    ]);

	    User::create([
		    'name' => "Đại học công nghệ",
		    'email' => 'uet@vnu.edu.vn',
		    'password' => bcrypt('123456'),
		    'role' => Role::getRole(0),
		    'type' => 3,
		    'university_id' => 1
	    ]);
    }
}
