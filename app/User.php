<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'university_id',
		'type',
		'role'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public static function findUserBySomeFeilds( $univercityID, $type ) {
		if ($type == 0){
			return self::whereIn( 'type', [ 2, 3 ] )->get();
		} else {
			return self::where( [
				'university_id' => $univercityID,
				'type'          => 4
			] )->get();
		}
	}
}
