<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanLoaiCanBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_loai_can_bos', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer( 'universities_id' );
	        $table->integer( 'thong_ke_nam' );
	        $table->integer( 'bien_che_nam' )->default(0);
	        $table->integer( 'bien_che_nu' )->default(0);
	        $table->integer( 'hop_dong_nam' )->default(0);
	        $table->integer( 'hop_dong_nu' )->default(0);
	        $table->integer( 'cb_khac_nam' )->default(0);
	        $table->integer( 'cb_khac_nu' )->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_loai_can_bos');
    }
}
