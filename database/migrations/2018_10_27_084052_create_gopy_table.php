<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gopy', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->bigIncrements('gy_ma')
                ->comment('Ma gop y');

            $table->dateTime('gy_thoiGian')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem gop y');
            
            $table->text('gy_noiDung')
                ->comment('Noi dung gop y');
            
            $table->unsignedBigInteger('kh_ma')
                ->comment('Ma khach hang');
            
            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');
            
            $table->unsignedTinyInteger('gy_trangThai')
                ->default(3)
                ->comment('Trang thai gop y: 1-Khoa, 2-Hien thi, 3-Cho duyet');
            
            $table->foreign('kh_ma')
                ->references('kh_ma')
                ->on('khachhang')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('gopy');
    }
}
