<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietthuoc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('donvi');
            $table->date('nsx');
            $table->date('hsd');
            $table->integer('soluong');
            $table->integer('idnsx')->unsigned();
            $table->integer('iddanhmuc')->unsigned();
            $table->timestamps();

            $table->foreign('idnsx')->references('id')->on('nhasanxuat');
            $table->foreign('iddanhmuc')->references('id')->on('danhmuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietthuoc');
    }
}
