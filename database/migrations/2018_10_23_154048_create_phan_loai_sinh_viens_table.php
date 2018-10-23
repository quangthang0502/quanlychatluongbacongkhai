<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanLoaiSinhViensTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'phan_loai_sinh_viens', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'universities_id' );
			$table->integer( 'thong_ke_nam' );
			$table->integer( 'nghien_cuu_sinh' )->default( '0' );
			$table->integer( 'hoc_vien_cao_hoc' )->default( '0' );
			$table->integer( 'dh_he_chinh_quy' )->default( '0' );
			$table->integer( 'dh_he_khong_chinh_quy' )->default( '0' );
			$table->integer( 'cd_he_chinh_quy' )->default( '0' );
			$table->integer( 'cd_he_khong_chinh_quy' )->default( '0' );
			$table->integer( 'tccn_he_chinh_quy' )->default( '0' );
			$table->integer( 'tccn_he_khong_chinh_quy' )->default( '0' );
			$table->integer( 'khac' )->default( '0' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'phan_loai_sinh_viens' );
	}
}
