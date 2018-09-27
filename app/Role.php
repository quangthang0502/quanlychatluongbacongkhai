<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
	public static $role = [
		'all',
		'get',
		'edit',
		'view'
	];

	public static function getRole($id){
		if (key_exists($id,self::$role)){
			return self::$role[$id];
		}else {
			return null;
		}
	}
}
