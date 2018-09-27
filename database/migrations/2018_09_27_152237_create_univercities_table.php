<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnivercitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univercities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vi_ten');
            $table->string('en_ten')->nullable();
            $table->string('vi_viet_tat')->nullable();
            $table->string('en_viet_tat')->nullable();
            $table->text('ten_cu')->nullable();
            $table->string('co_quan')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->date('nam_thanh_lap')->nullable();
            $table->string('thoi_gian_bat_dau_dao_tao')->nullable();
            $table->date('thoi_gian_cap_bang_khoa_dau')->nullable();
            $table->integer('gioi_thieu_id')->nullable();
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
        Schema::dropIfExists('univercities');
    }
}
