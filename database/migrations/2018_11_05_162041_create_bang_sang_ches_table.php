<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangSangChesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bang_sang_ches', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('noi_dung')->nullable();
            $table->integer( 'nam_thong_ke' );
            $table->integer( 'universities_id' )->nullable();
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
        Schema::dropIfExists('bang_sang_ches');
    }
}
