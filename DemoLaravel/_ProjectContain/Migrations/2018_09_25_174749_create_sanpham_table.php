<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('masp');   
            $table->string('tensp', 100); 
            $table->integer('soluong');     
            $table->integer('gia');  
            $table->integer('maloaisp')->unsigned();
            //onDelete cascade tức là khi xóa sẽ xóa tất cả các thành phần liên quan 
            // và có khóa ngoại là maloaisp
            $table->foreign('maloaisp')->references('maloaisp')->on('loaisanpham')->onDelete('cascade');   

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
        Schema::dropIfExists('sanpham');
    }
}
