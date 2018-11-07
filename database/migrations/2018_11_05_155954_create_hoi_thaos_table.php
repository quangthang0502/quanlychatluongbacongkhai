<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoiThaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoi_thaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quoc_te')->default(0);
            $table->integer( 'trong_nuoc' )->default(0);
            $table->integer( 'cap_truong' )->default(0);
            $table->integer( 'nam_thong_ke' );
            $table->text('sl_theo_can_bo');
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
        Schema::dropIfExists('hoi_thaos');
    }
}
