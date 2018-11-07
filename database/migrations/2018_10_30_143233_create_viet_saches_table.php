<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVietSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viet_saches', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->integer( 'nam_thong_ke' );
            $table->integer( 'universities_id' )->nullable();
            $table->integer('sach_chuyen_khao')->default(0);
            $table->integer( 'sach_giao_trinh' )->default(0);
            $table->integer( 'cap_truong' )->default(0);
            $table->float( 'sach_tham_khao' )->default(0);
            $table->float( 'sach_huong_dan' )->default(0);
            $table->float( 'sl_theo_can_bo' )->default(0);
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
        Schema::dropIfExists('viet_saches');
    }
}
