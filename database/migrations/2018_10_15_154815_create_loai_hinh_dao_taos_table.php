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
			$table->integer('dao_tao_id');
			$table->integer( 'chinh_quy' )->default(0);
			$table->integer( 'khong_chinh_quy' )->default(0);
			$table->integer( 'tu_xa' )->default(0);
			$table->integer( 'lien_ket_nuoc_ngoai' )->default(0);
			$table->integer( 'lien_ket_trong_nuoc' )->default(0);
			$table->text( 'khac' )->nullable();
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
