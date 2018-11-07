<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoSoVatChatsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'co_so_vat_chats', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'universities_id' );
			$table->integer( 'nam_thong_ke' );
			$table->bigInteger( 'tong_dien_tich' )->default( 0 );
			$table->float( 'noi_lam_viec' )->default( 0 );
			$table->float( 'noi_hoc' )->default( 0 );
			$table->float( 'noi_vui_choi' )->default( 0 );
			$table->float( 'dien_tich_phong_hoc' )->default( 0 );
			$table->float( 'ty_so_dien_tich_tren_sv' )->default( 0 );
			$table->integer('so_sach_tv')->default( 0 );
			$table->integer('sach_dao_tao')->default( 0 );
			$table->integer('so_may_tinh_vp')->default( 0 );
			$table->integer('so_may_tinh_sv')->default( 0 );
			$table->integer('ty_so_mt_tren_sv')->default( 0 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'co_so_vat_chats' );
	}
}
