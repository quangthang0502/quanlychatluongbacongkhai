<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyenNganhDaoTaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyen_nganh_dao_taos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dao_tao_id');
            $table->integer('dao_tao_tien_sy');
            $table->integer('dao_tao_thac_sy');
            $table->integer('dao_tao_dai_hoc');
            $table->integer('dao_tao_cao_dang');
            $table->integer('dao_tao_tccn');
            $table->integer('dao_tao_nghe');
            $table->text('dao_tao_khac');
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
        Schema::dropIfExists('chuyen_nganh_dao_taos');
    }
}
