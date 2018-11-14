<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanBoChuChotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('can_bo_chu_chots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('universities_id');
            $table->integer('bo_phan_id')->nullable();
            $table->string('hoc_vi')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->string('ho_va_ten');
            $table->integer('nam_sinh');
            $table->integer('thong_ke_nam');
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
        Schema::dropIfExists('can_bo_chu_chots');
    }
}
