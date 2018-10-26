<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NckhNghiemThu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'nckh_nghiem_thus', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer('cap_nn')->default(0);
            $table->integer( 'cap_bo' )->default(0);
            $table->integer( 'cap_truong' )->default(0);
            $table->float( 'doanh_thu' )->default(0);
            $table->float( 'ti_so_doanh_thu' )->default(0);
            $table->float( 'ti_le_doanh_thu' )->default(0);
            $table->year( 'nam_thong_ke' );
            $table->text('sl_theo_can_bo');
            $table->integer( 'universities_id' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists( 'nckh_nghiem_thus' );
    }
}
