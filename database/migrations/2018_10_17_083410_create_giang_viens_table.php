<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiangViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giang_viens', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer( 'universities_id' );
	        $table->integer( 'thong_ke_nam' );
	        $table->integer( 'trinh_do' );
	        $table->integer( 'giao_vien_nam' );
	        $table->integer( 'gv_bien_che' )->default(0);
	        $table->integer( 'gv_hop_dong' )->default(0);
	        $table->integer( 'gv_quan_ly' )->default(0);
	        $table->string( 'do_tuoi' )->nullable();
	        $table->string( 'trinh_do_ngoai_ngu' )->nullable();
	        $table->string( 'tin_hoc' )->nullable();
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
        Schema::dropIfExists('giang_viens');
    }
}
