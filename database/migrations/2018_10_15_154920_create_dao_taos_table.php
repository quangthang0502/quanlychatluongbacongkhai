<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaoTaosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'dao_taos', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'universities_id' );
			$table->integer( 'tong_so_cac_khoa' );
			$table->integer( 'thong_ke_nam' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'dao_taos' );
	}
}
