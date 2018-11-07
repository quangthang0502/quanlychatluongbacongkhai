<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiTucXasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'ki_tuc_xas', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'nam_thong_ke' );
			$table->integer( 'universities_id' );
			$table->integer( 'tong_dien_tich' )->default( 0 );
			$table->integer( 'nhu_cau' )->default( 0 );
			$table->integer( 'duoc_o' )->default( 0 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'ki_tuc_xas' );
	}
}
