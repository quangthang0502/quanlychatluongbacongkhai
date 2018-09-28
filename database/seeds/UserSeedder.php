<?php

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

	    User::create([
		    'name' => "Đại học công nghệ",
		    'email' => 'uet@vnu.edu.vn',
		    'password' => bcrypt('123456'),
		    'role' => Role::getRole(0),
		    'type' => 3
	    ]);
    }
}
