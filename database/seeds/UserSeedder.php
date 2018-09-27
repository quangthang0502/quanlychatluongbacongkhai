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
    }
}
