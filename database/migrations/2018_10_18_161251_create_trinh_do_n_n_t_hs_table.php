<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrinhDoNNTHsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trinh_do_n_n_t_hs', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer( 'universities_id' );
	        $table->integer( 'thong_ke_nam' );
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
        Schema::dropIfExists('trinh_do_n_n_t_hs');
    }
}
