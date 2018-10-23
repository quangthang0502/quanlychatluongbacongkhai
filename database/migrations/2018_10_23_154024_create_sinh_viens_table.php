<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('universities_id');
	        $table->integer( 'thong_ke_nam' );
	        $table->integer( 'sl_du_thi' )->nullable();
	        $table->integer( 'sl_trung_tuyen' )->nullable();
	        $table->integer( 'sl_nhap_hoc' )->nullable();
	        $table->integer( 'sl_sv_quoc_te' )->nullable();
	        $table->string( 'trinh_do' )->default('dai_hoc');
	        $table->float( 'diem_dau_vao' )->nullable();
	        $table->float( 'diem_tb' )->nullable();
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
        Schema::dropIfExists('sinh_viens');
    }
}
