<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhTrangTotNghiepsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'tinh_trang_tot_nghieps', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'universities_id' );
			$table->string( 'type' )->default( 'chinh_quy' );
			$table->integer( 'thong_ke_nam' );
			$table->integer( 'so_luong_sv_tot_nghiep' )->default( 0 );
			$table->float( 'ty_le_tot_nghiep' )->default( 0 );
			$table->integer( 'cau_3_1' )->default( 0 );
			$table->integer( 'cau_3_2' )->default( 0 );
			$table->integer( 'cau_3_3' )->default( 0 );
			$table->integer( 'cau_4_1' )->default( 0 );
			$table->integer( 'cau_4_2' )->default( 0 );
			$table->integer( 'cau_4_3' )->default( 0 );
			$table->integer( 'cau_5_1' )->default( 0 );
			$table->integer( 'cau_5_2' )->default( 0 );
			$table->integer( 'cau_5_3' )->default( 0 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'tinh_trang_tot_nghieps' );
	}
}
