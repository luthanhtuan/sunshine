<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            
            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('sp_ma')
                ->default(1)
                ->comment('Ma san pham');
            
            $table->unsignedTinyInteger('ha_stt')
                ->default(1)
                ->comment('So thu tu hinh anh');
            
            $table->string('ha_ten', 150)
                ->comment('Ten hinh anh 150 ky tu');
            
            $table->primary(['sp_ma','ha_stt']);

            $table->foreign('sp_ma')
                ->references('sp_ma')
                ->on('sanpham')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanh');
    }
}
