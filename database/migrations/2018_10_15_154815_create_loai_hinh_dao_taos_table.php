<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiHinhDaoTaosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'loai_hinh_dao_taos', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'chinh_quy' );
			$table->integer( 'khong_chinh_quy' );
			$table->integer( 'tu_xa' );
			$table->integer( 'lien_ket_nuoc_ngoai' );
			$table->integer( 'lien_ket_trong_nuoc' );
			$table->text( 'khac' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'loai_hinh_dao_taos' );
	}
}
