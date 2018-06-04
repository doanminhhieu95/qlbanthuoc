<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuoc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idhang')->unsigned();
            $table->integer('iddieutri')->unsigned();
            $table->string('masanpham')->nullable();
            $table->string('name');
            $table->string('hoatchat')->nullable();
            $table->integer('idnsx')->unsigned();
            $table->integer('iddvt1')->unsigned();
            $table->integer('iddvt2')->unsigned();
            $table->integer('heso');
            $table->integer('idcachsd')->unsigned();
            $table->integer('gianhap');
            $table->integer('banbuon');
            $table->integer('banle');
            $table->integer('niemyet');
            $table->integer('tonmax');
            $table->integer('tonmin');
            $table->integer('doisong');
            $table->integer('idbaoquan')->unsigned();
            $table->integer('idvitri')->unsigned();
            $table->integer('ngaycanhbao');
            $table->integer('soluongcanhbao');
            $table->boolean('theodon');
            $table->boolean('treem');
            $table->boolean('huongthan');
            $table->boolean('anhsang');
            $table->boolean('amuot');
            $table->boolean('bhyt');
            $table->string('quycach')->nullable();
            $table->string('sodangky')->nullable();
            $table->string('dangbaoche')->nullable();
            $table->string('congtydangky')->nullable();
            $table->string('thongtin')->nullable();
            $table->timestamps();

            $table->foreign('idhang')->references('id')->on('nhomhang');
            $table->foreign('iddieutri')->references('id')->on('nhomdieutri');
            $table->foreign('idnsx')->references('id')->on('nhasanxuat');
            $table->foreign('iddvt1')->references('id')->on('donvitinh');
            $table->foreign('iddvt2')->references('id')->on('donvitinh');
            $table->foreign('idcachsd')->references('id')->on('cachsudung');
            $table->foreign('idbaoquan')->references('id')->on('baoquan');
            $table->foreign('idvitri')->references('id')->on('vitri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuoc');
    }
}
