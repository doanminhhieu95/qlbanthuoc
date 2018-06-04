<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sohieu')->unique();
            $table->string('name')->unique();
            $table->longText('diachi')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('masothue')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('nguoilienhe')->nullable();
            $table->boolean('khachhang');
            $table->integer('idnhomncc')->unsigned();
            $table->timestamps();

            $table->foreign('idnhomncc')->references('id')->on('nhomncc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
