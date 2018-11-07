<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiChinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_chinhs', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer( 'universities_id' );
	        $table->integer( 'nam_thong_ke' );
	        $table->float('tong_kinh_phi')->default(0);
	        $table->float('tong_thu_hoc_phi')->default(0);
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
        Schema::dropIfExists('tai_chinhs');
    }
}
