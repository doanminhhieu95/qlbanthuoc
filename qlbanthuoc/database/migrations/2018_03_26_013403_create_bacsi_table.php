<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bacsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sohieu')->unique();
            $table->string('name');
            $table->string('diachi')->nullable();
            $table->string('chungchi')->nullable();
            $table->string('noicongtac')->nullable();
            $table->string('taikhoan')->nullable();
            $table->integer('idkhoa')->unsigned();
            $table->timestamps();

            $table->foreign('idkhoa')->references('id')->on('khoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bacsi');
    }
}
